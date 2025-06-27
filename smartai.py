import openai
import os
import fitz
import speech_recognition as sr
from pydub import AudioSegment
from telegram.ext import Updater, MessageHandler, Filters, CommandHandler, CallbackContext
from telegram import Update, ReplyKeyboardMarkup, KeyboardButton
from collections import defaultdict
from PIL import Image
import pytesseract
import smtplib
from email.message import EmailMessage

openai.api_key = "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"
TELEGRAM_TOKEN = "7934285625:AAGRo9_nWhgst8T4nImecq1x1KPFPvxynjg"
GPT_MODEL = "gpt-3.5-turbo"  # yoki gpt-4

authorized_users = {}
user_docs = {}
user_context = defaultdict(list)
user_lang = defaultdict(lambda: "uz")
user_model = defaultdict(lambda: "gpt-3.5-turbo")

# 🟢 START

def start(update: Update, context: CallbackContext):
    user_id = update.message.from_user.id
    keyboard = [[KeyboardButton("Uz"), KeyboardButton("En")],
                [KeyboardButton("GPT-3.5"), KeyboardButton("GPT-4")]]
    markup = ReplyKeyboardMarkup(keyboard, resize_keyboard=True)
    update.message.reply_text("Salom! Menga PIN kiriting:", reply_markup=markup)
    authorized_users[user_id] = False

def pin_handler(update: Update, context: CallbackContext):
    user_id = update.message.from_user.id
    if not authorized_users.get(user_id, False):
        if update.message.text == "1234":
            authorized_users[user_id] = True
            update.message.reply_text("✅ Avtorizatsiya muvaffaqiyatli. Endi botdan foydalanishingiz mumkin.")
        else:
            update.message.reply_text("❌ Noto‘g‘ri PIN. Iltimos, qaytadan urinib ko‘ring.")

# 🌐 TIL TANLASH va MODEL TANLASH

def handle_text(update: Update, context: CallbackContext):
    user_id = update.message.from_user.id
    msg = update.message.text

    if msg in ["Uz", "En"]:
        user_lang[user_id] = msg.lower()
        update.message.reply_text(f"🌐 Til tanlandi: {msg}")
        return
    if msg == "GPT-3.5":
        user_model[user_id] = "gpt-3.5-turbo"
        update.message.reply_text("🧠 Model: GPT-3.5 tanlandi")
        return
    if msg == "GPT-4":
        user_model[user_id] = "gpt-4"
        update.message.reply_text("🧠 Model: GPT-4 tanlandi")
        return

    if not authorized_users.get(user_id):
        update.message.reply_text("❗ Iltimos, avval PIN kiriting.")
        return

    user_context[user_id].append({"role": "user", "content": msg})
    try:
        res = openai.ChatCompletion.create(
            model=user_model[user_id],
            messages=[{"role": "system", "content": "Yordamchi"}] + user_context[user_id]
        )
        reply = res["choices"][0]["message"]["content"]
        user_context[user_id].append({"role": "assistant", "content": reply})
        update.message.reply_text(reply)
    except Exception as e:
        update.message.reply_text(f"Xatolik: {e}")

# 📄 PDFdan XULOSA

def handle_pdf(update: Update, context: CallbackContext):
    user_id = update.message.from_user.id
    file = update.message.document
    path = f"{user_id}.pdf"

    file.get_file().download(path)
    text = ""
    try:
        doc = fitz.open(path)
        for page in doc:
            text += page.get_text()
        doc.close()
        os.remove(path)
        user_docs[user_id] = text

        prompt = f"Quyidagi matndan asosiy 3-5 fikrni chiqar:\n\n{text[:2000]}"
        res = openai.ChatCompletion.create(
            model=user_model[user_id],
            messages=[
                {"role": "system", "content": "PDFdan xulosa chiqaruvchi AI yordamchi"},
                {"role": "user", "content": prompt}
            ]
        )
        update.message.reply_text(res["choices"][0]["message"]["content"])
    except Exception as e:
        update.message.reply_text(f"Xatolik: {e}")

# 🎤 OVOZLI XABAR

def handle_voice(update: Update, context: CallbackContext):
    user_id = update.message.from_user.id
    voice = update.message.voice
    file_path = f"{user_id}.ogg"
    wav_path = f"{user_id}.wav"

    voice.get_file().download(file_path)
    AudioSegment.from_ogg(file_path).export(wav_path, format="wav")
    os.remove(file_path)

    r = sr.Recognizer()
    with sr.AudioFile(wav_path) as source:
        audio = r.record(source)
        try:
            text = r.recognize_google(audio, language="uz-UZ")
            update.message.reply_text(f"📜 Matn: {text}")
            update.message.text = text
            handle_text(update, context)
        except:
            update.message.reply_text("❌ Ovoz tanilmadi")
    os.remove(wav_path)

# 🖼️ RASM ANALIZ

def handle_photo(update: Update, context: CallbackContext):
    user_id = update.message.from_user.id
    photo = update.message.photo[-1].get_file()
    path = f"{user_id}.jpg"
    photo.download(path)

    try:
        img = Image.open(path)
        text = pytesseract.image_to_string(img)
        os.remove(path)
        update.message.reply_text(f"🖼️ Rasm matni:\n{text}")
    except Exception as e:
        update.message.reply_text("❌ Rasm analizida xatolik: " + str(e))

# 💳 PULLIK XIZMAT

def buy_service(update: Update, context: CallbackContext):
    update.message.reply_text("💰 Ushbu xizmat pullik. To‘lov uchun admin bilan bog‘laning.")

# 📧 EMAIL YUBORISH

def send_email(to_email, subject, body):
    msg = EmailMessage()
    msg["Subject"] = subject
    msg["From"] = "youremail@gmail.com"
    msg["To"] = to_email
    msg.set_content(body)

    with smtplib.SMTP_SSL("smtp.gmail.com", 465) as smtp:
        smtp.login("youremail@gmail.com", "EMAIL_PASSWORD")
        smtp.send_message(msg)

# 🔒 ADMIN PANEL (Oddiy)

def admin_panel(update: Update, context: CallbackContext):
    user_id = update.message.from_user.id
    if user_id == 123456789:  # admin ID
        msg = f"👥 Foydalanuvchilar soni: {len(authorized_users)}"
        update.message.reply_text(msg)
    else:
        update.message.reply_text("❌ Siz admin emassiz.")

# 🚀 MAIN

def main():
    updater = Updater(TELEGRAM_TOKEN, use_context=True)
    dp = updater.dispatcher

    dp.add_handler(CommandHandler("start", start))
    dp.add_handler(CommandHandler("buy", buy_service))
    dp.add_handler(CommandHandler("admin", admin_panel))
    dp.add_handler(MessageHandler(Filters.voice, handle_voice))
    dp.add_handler(MessageHandler(Filters.photo, handle_photo))
    dp.add_handler(MessageHandler(Filters.document.mime_type("application/pdf"), handle_pdf))
    dp.add_handler(MessageHandler(Filters.text & ~Filters.command, pin_handler))
    dp.add_handler(MessageHandler(Filters.text & ~Filters.command, handle_text))

    print("🤖 UNIVERSAL AI BOT ISHLAMOQDA...")
    updater.start_polling()
    updater.idle()

main()
 
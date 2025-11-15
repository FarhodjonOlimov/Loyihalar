import { corsHeaders } from '../_shared/cors.ts';

const ONSPACE_AI_API_KEY = Deno.env.get('ONSPACE_AI_API_KEY');
const ONSPACE_AI_BASE_URL = Deno.env.get('ONSPACE_AI_BASE_URL');

interface Message {
  role: 'user' | 'assistant';
  content: string;
}

interface RequestBody {
  messages: Message[];
  language: 'uz' | 'en' | 'ru';
}

const systemPrompts = {
  uz: `Siz TeleSales Pro kompaniyasining yordamchi chatbotisiz. Siz mijozlarga telefon sotuv xizmatlari, call-center yechimlari va biznes kommunikatsiya xizmatlari haqida ma'lumot berasiz. 

Kompaniya haqida:
- TeleSales Pro - telefon sotuv va call-center xizmatlarida mutaxassis
- 500+ mijoz, 1000+ loyiha, 50+ mamlakat bilan ishlash tajribasi
- 24/7 qo'llab-quvvatlash, ko'p tilli xizmat (30+ til)
- Zamonaviy CRM integratsiyalari va AI yechimlari
- Professional jamoa va xalqaro tajriba

Xizmatlar:
1. Telefon sotuv xizmatlari
2. Call-center yechimlari
3. CRM tizimlar bilan integratsiya
4. Tahlil va hisobotlar
5. Ko'p tilli xizmat ko'rsatish
6. Biznes konsalting

Do'stona va professional tarzda javob bering. Agar savolga javob bilmasangiz, mijozni bizning mutaxassislarimiz bilan bog'lanishga taklif qiling.`,
  
  en: `You are a helpful chatbot for TeleSales Pro. You help customers learn about telephone sales services, call center solutions, and business communication services.

About the company:
- TeleSales Pro - specialized in telephone sales and call center services
- 500+ clients, 1000+ projects, experience working with 50+ countries
- 24/7 support, multilingual service (30+ languages)
- Modern CRM integrations and AI solutions
- Professional team and international experience

Services:
1. Telephone sales services
2. Call center solutions
3. CRM system integrations
4. Analytics and reports
5. Multilingual service
6. Business consulting

Respond in a friendly and professional manner. If you don't know the answer to a question, invite the customer to contact our specialists.`,
  
  ru: `Вы - полезный чат-бот для TeleSales Pro. Вы помогаете клиентам узнать об услугах телефонных продаж, решениях колл-центра и услугах бизнес-коммуникаций.

О компании:
- TeleSales Pro - специализируется на телефонных продажах и услугах колл-центра
- 500+ клиентов, 1000+ проектов, опыт работы с 50+ странами
- Поддержка 24/7, многоязычное обслуживание (30+ языков)
- Современные CRM интеграции и AI решения
- Профессиональная команда и международный опыт

Услуги:
1. Услуги телефонных продаж
2. Решения для колл-центра
3. Интеграции с CRM системами
4. Аналитика и отчеты
5. Многоязычное обслуживание
6. Бизнес-консалтинг

Отвечайте дружелюбно и профессионально. Если вы не знаете ответа на вопрос, предложите клиенту связаться с нашими специалистами.`,
};

Deno.serve(async (req) => {
  // Handle CORS preflight
  if (req.method === 'OPTIONS') {
    return new Response('ok', { headers: corsHeaders });
  }

  try {
    const { messages, language }: RequestBody = await req.json();

    if (!ONSPACE_AI_API_KEY || !ONSPACE_AI_BASE_URL) {
      throw new Error('OnSpace AI configuration missing');
    }

    const systemPrompt = systemPrompts[language] || systemPrompts.en;

    const response = await fetch(`${ONSPACE_AI_BASE_URL}/chat/completions`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${ONSPACE_AI_API_KEY}`,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        model: 'google/gemini-2.5-flash',
        messages: [
          { role: 'system', content: systemPrompt },
          ...messages,
        ],
        temperature: 0.7,
        max_tokens: 500,
      }),
    });

    if (!response.ok) {
      const errorText = await response.text();
      console.error('OnSpace AI error:', errorText);
      throw new Error(`OnSpace AI: ${response.status} - ${errorText}`);
    }

    const data = await response.json();
    const assistantMessage = data.choices[0].message.content;

    return new Response(
      JSON.stringify({ message: assistantMessage }),
      {
        headers: { ...corsHeaders, 'Content-Type': 'application/json' },
      }
    );
  } catch (error) {
    console.error('Chat function error:', error);
    return new Response(
      JSON.stringify({ error: error.message }),
      {
        status: 500,
        headers: { ...corsHeaders, 'Content-Type': 'application/json' },
      }
    );
  }
});

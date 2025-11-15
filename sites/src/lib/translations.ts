import { Translations } from '../types';

export const translations: Record<'uz' | 'en' | 'ru', Translations> = {
  uz: {
    nav: {
      home: 'Bosh sahifa',
      about: 'Biz haqimizda',
      services: 'Xizmatlar',
      products: 'Mahsulotlar',
      gallery: 'Galereya',
      team: 'Jamoa',
      pricing: 'Narxlar',
      features: 'Imkoniyatlar',
      contact: 'Aloqa',
    },
    hero: {
      title: 'Professional Telefon Sotuv Yechimlari',
      subtitle: 'Xalqaro biznesingiz uchun eng zamonaviy telefon sotuv va call-center xizmatlari',
      cta: 'Biz bilan bog\'lanish',
      typingText: [
        'Mijozlar bilan aloqa...',
        'Sotuv avtomatlashtirish...',
        'Call-center yechimlari...',
        'Xalqaro xizmat...',
      ],
    },
    about: {
      title: 'Biz haqimizda',
      description: 'TeleSales Pro - telefon sotuv va mijozlar bilan ishlash sohasida yetakchi kompaniya. Biz xalqaro standartlarga mos professional xizmatlar taqdim etamiz va biznesingizni yangi bosqichga olib chiqishga yordam beramiz.',
      stats: {
        clients: 'Mijozlar',
        projects: 'Loyihalar',
        satisfaction: 'Qoniqish',
        countries: 'Mamlakatlar',
      },
    },
    services: {
      title: 'Bizning xizmatlarimiz',
      subtitle: 'To\'liq spektrli telefon sotuv yechimlari',
      items: [
        {
          title: 'Telefon sotuv',
          description: 'Professional telefon orqali sotuv xizmatlari va mijozlar bilan ishlash strategiyalari',
        },
        {
          title: 'Call-center',
          description: 'To\'liq jihozlangan call-center yechimlari va operatorlar tayyorlash',
        },
        {
          title: 'CRM integratsiya',
          description: 'Zamonaviy CRM tizimlari bilan integratsiya va avtomatlashtirish',
        },
        {
          title: 'Tahlil va hisobotlar',
          description: 'Batafsil tahlillar va real-time statistika',
        },
        {
          title: 'Ko\'p tilli xizmat',
          description: '30+ tillarda professional xizmat ko\'rsatish',
        },
        {
          title: 'Konsalting',
          description: 'Sotuv jarayonlarini optimallashtirish bo\'yicha maslahat',
        },
      ],
    },
    features: {
      title: 'Nima uchun bizni tanlash kerak',
      subtitle: 'Bizning raqobatdagi afzalliklarimiz',
      items: [
        {
          title: 'Professional jamoa',
          description: 'Tajribali mutaxassislar va sertifikatlangan operatorlar',
        },
        {
          title: 'Zamonaviy texnologiyalar',
          description: 'Eng so\'nggi call-center tizimlari va AI yechimlar',
        },
        {
          title: '24/7 qo\'llab-quvvatlash',
          description: 'Doimiy texnik yordam va mijozlar xizmati',
        },
        {
          title: 'Xalqaro tajriba',
          description: '50+ mamlakat bilan ishlash tajribasi',
        },
      ],
    },
    contact: {
      title: 'Biz bilan bog\'laning',
      subtitle: 'Biznesingizni rivojlantirish uchun bugun boshlansin',
      name: 'Ismingiz',
      email: 'Email manzilingiz',
      message: 'Xabaringiz',
      send: 'Yuborish',
      phone: '+998 90 123 45 67',
      address: 'Toshkent, O\'zbekiston',
    },
    chatbot: {
      title: 'Yordam kerakmi?',
      placeholder: 'Savolingizni yozing...',
      send: 'Yuborish',
      greeting: 'Salom! Men sizga qanday yordam bera olaman?',
    },
    products: {
      title: 'Bizning mahsulotlar',
      subtitle: 'Zamonaviy telefon sotuv yechimlari va mahsulotlari',
      items: [
        {
          name: 'CallPro Enterprise',
          description: 'Professional call-center platforma katta bizneslar uchun',
          features: ['500+ operator', 'AI tahlil', 'CRM integratsiya', 'Real-time monitoring'],
        },
        {
          name: 'SalesMaster',
          description: 'Telefon sotuv avtomatlashtirish tizimi',
          features: ['Avtomatik qo\'ng\'iroqlar', 'Script boshqaruvi', 'Natija tahlili', 'Hisobotlar'],
        },
        {
          name: 'CloudCall Lite',
          description: 'Kichik va o\'rta bizneslar uchun yechim',
          features: ['50+ operator', 'Bulutli xizmat', 'Mobil ilova', 'Arzon narx'],
        },
        {
          name: 'AI Assistant Pro',
          description: 'Sun\'iy intellekt asosidagi virtual operator',
          features: ['30+ til', '24/7 ish', 'Tabiiy nutq', 'O\'rganish qobiliyati'],
        },
      ],
    },
    gallery: {
      title: 'Loyihalar gallereyasi',
      subtitle: 'Bizning muvaffaqiyatli loyihalarimiz va mijozlar',
      viewProject: 'Loyihani ko\'rish',
    },
    team: {
      title: 'Bizning jamoa',
      subtitle: 'Professional mutaxassislar va tajribali rahbarlar',
      members: [
        {
          name: 'Alisher Rahimov',
          position: 'Bosh direktor',
          bio: '15+ yillik tajriba telefon sotuv sohasida',
        },
        {
          name: 'Madina Karimova',
          position: 'Texnologiya direktori',
          bio: 'AI va call-center tizimlari mutaxassisi',
        },
        {
          name: 'Davron Tursunov',
          position: 'Sotuv direktori',
          bio: 'Xalqaro bozorlar va strategiya bo\'yicha ekspert',
        },
        {
          name: 'Nilufar Yunusova',
          position: 'Mijozlar xizmati rahbari',
          bio: 'Mijozlar qoniqtirish va jamoani rivojlantirish',
        },
      ],
    },
    testimonials: {
      title: 'Mijozlar fikrlari',
      subtitle: 'Bizning mijozlarimiz biz haqimizda nima deyishadi',
      items: [
        {
          name: 'Kamol Abdullayev',
          company: 'TechCorp Uzbekistan',
          role: 'Bosh direktor',
          content: 'TeleSales Pro bilan ishlash bizning sotuv ko\'rsatkichlarimizni 150% ga oshirdi. Professional jamoa va zamonaviy texnologiyalar!',
        },
        {
          name: 'Elena Petrova',
          company: 'Global Trade LLC',
          role: 'Marketing direktori',
          content: 'Ajoyib xizmat va professional yondashuv. Har bir tafsilotga e\'tibor beriladi. Juda mamnunmiz!',
        },
        {
          name: 'Ahmad Karimov',
          company: 'Smart Solutions',
          role: 'Ta\'sis etuvchi',
          content: 'Eng yaxshi call-center yechimlari. 24/7 qo\'llab-quvvatlash va yuqori sifatli xizmat. Tavsiya qilaman!',
        },
      ],
    },
    pricing: {
      title: 'Narxlar',
      subtitle: 'Har qanday biznes uchun qulay tariflar',
      monthly: 'Oylik',
      yearly: 'Yillik',
      save: 'Tejash',
      perMonth: '/oy',
      selectPlan: 'Rejani tanlash',
      popular: 'Ommabop',
      plans: [
        {
          name: 'Starter',
          price: '299',
          yearlyPrice: '2990',
          description: 'Kichik bizneslar uchun',
          features: [
            '10 operatorga qadar',
            'Asosiy CRM integratsiya',
            'Email qo\'llab-quvvatlash',
            'Asosiy hisobotlar',
            'Bulutli xizmat',
          ],
        },
        {
          name: 'Professional',
          price: '899',
          yearlyPrice: '8990',
          description: 'O\'sib borayotgan bizneslar uchun',
          popular: true,
          features: [
            '50 operatorga qadar',
            'To\'liq CRM integratsiya',
            '24/7 qo\'llab-quvvatlash',
            'Advanced tahlil',
            'API kirish',
            'Ko\'p tilli xizmat',
            'Maxsus treninglar',
          ],
        },
        {
          name: 'Enterprise',
          price: 'Maxsus',
          yearlyPrice: 'Maxsus',
          description: 'Katta korxonalar uchun',
          features: [
            'Cheklanmagan operatorlar',
            'Maxsus yechimlar',
            'Shaxsiy menejer',
            'AI integratsiya',
            'Maxsus rivojlantirish',
            'SLA kafolati',
            'Onsite treninglar',
            'Premium qo\'llab-quvvatlash',
          ],
        },
      ],
    },
    partners: {
      title: 'Bizning hamkorlar',
      subtitle: 'Dunyoning yetakchi kompaniyalari bizga ishonadi',
    },
  },
  en: {
    nav: {
      home: 'Home',
      about: 'About',
      services: 'Services',
      products: 'Products',
      gallery: 'Gallery',
      team: 'Team',
      pricing: 'Pricing',
      features: 'Features',
      contact: 'Contact',
    },
    hero: {
      title: 'Professional Telephone Sales Solutions',
      subtitle: 'Advanced telephone sales and call-center services for your international business',
      cta: 'Get in Touch',
      typingText: [
        'Customer engagement...',
        'Sales automation...',
        'Call center solutions...',
        'International service...',
      ],
    },
    about: {
      title: 'About Us',
      description: 'TeleSales Pro is a leading company in telephone sales and customer relations. We provide professional services that meet international standards and help take your business to the next level.',
      stats: {
        clients: 'Clients',
        projects: 'Projects',
        satisfaction: 'Satisfaction',
        countries: 'Countries',
      },
    },
    services: {
      title: 'Our Services',
      subtitle: 'Comprehensive telephone sales solutions',
      items: [
        {
          title: 'Telephone Sales',
          description: 'Professional telephone sales services and customer engagement strategies',
        },
        {
          title: 'Call Center',
          description: 'Fully equipped call center solutions and operator training',
        },
        {
          title: 'CRM Integration',
          description: 'Integration and automation with modern CRM systems',
        },
        {
          title: 'Analytics & Reports',
          description: 'Detailed analytics and real-time statistics',
        },
        {
          title: 'Multilingual Service',
          description: 'Professional service in 30+ languages',
        },
        {
          title: 'Consulting',
          description: 'Consultation on optimizing sales processes',
        },
      ],
    },
    features: {
      title: 'Why Choose Us',
      subtitle: 'Our competitive advantages',
      items: [
        {
          title: 'Professional Team',
          description: 'Experienced specialists and certified operators',
        },
        {
          title: 'Modern Technologies',
          description: 'Latest call center systems and AI solutions',
        },
        {
          title: '24/7 Support',
          description: 'Continuous technical assistance and customer service',
        },
        {
          title: 'International Experience',
          description: 'Experience working with 50+ countries',
        },
      ],
    },
    contact: {
      title: 'Contact Us',
      subtitle: 'Let\'s start growing your business today',
      name: 'Your Name',
      email: 'Your Email',
      message: 'Your Message',
      send: 'Send',
      phone: '+998 90 123 45 67',
      address: 'Tashkent, Uzbekistan',
    },
    chatbot: {
      title: 'Need Help?',
      placeholder: 'Type your question...',
      send: 'Send',
      greeting: 'Hello! How can I help you?',
    },
    products: {
      title: 'Our Products',
      subtitle: 'Modern telephone sales solutions and products',
      items: [
        {
          name: 'CallPro Enterprise',
          description: 'Professional call center platform for large businesses',
          features: ['500+ operators', 'AI analytics', 'CRM integration', 'Real-time monitoring'],
        },
        {
          name: 'SalesMaster',
          description: 'Telephone sales automation system',
          features: ['Auto-dialing', 'Script management', 'Performance analytics', 'Reports'],
        },
        {
          name: 'CloudCall Lite',
          description: 'Solution for small and medium businesses',
          features: ['50+ operators', 'Cloud service', 'Mobile app', 'Affordable pricing'],
        },
        {
          name: 'AI Assistant Pro',
          description: 'AI-powered virtual operator',
          features: ['30+ languages', '24/7 operation', 'Natural speech', 'Learning capability'],
        },
      ],
    },
    gallery: {
      title: 'Project Gallery',
      subtitle: 'Our successful projects and clients',
      viewProject: 'View Project',
    },
    team: {
      title: 'Our Team',
      subtitle: 'Professional experts and experienced leaders',
      members: [
        {
          name: 'Alisher Rahimov',
          position: 'Chief Executive Officer',
          bio: '15+ years experience in telephone sales',
        },
        {
          name: 'Madina Karimova',
          position: 'Chief Technology Officer',
          bio: 'AI and call center systems specialist',
        },
        {
          name: 'Davron Tursunov',
          position: 'Sales Director',
          bio: 'International markets and strategy expert',
        },
        {
          name: 'Nilufar Yunusova',
          position: 'Customer Service Manager',
          bio: 'Customer satisfaction and team development',
        },
      ],
    },
    testimonials: {
      title: 'Client Testimonials',
      subtitle: 'What our clients say about us',
      items: [
        {
          name: 'Kamol Abdullayev',
          company: 'TechCorp Uzbekistan',
          role: 'CEO',
          content: 'Working with TeleSales Pro increased our sales by 150%. Professional team and modern technologies!',
        },
        {
          name: 'Elena Petrova',
          company: 'Global Trade LLC',
          role: 'Marketing Director',
          content: 'Excellent service and professional approach. Attention to every detail. Very satisfied!',
        },
        {
          name: 'Ahmad Karimov',
          company: 'Smart Solutions',
          role: 'Founder',
          content: 'Best call center solutions. 24/7 support and high-quality service. Highly recommend!',
        },
      ],
    },
    pricing: {
      title: 'Pricing',
      subtitle: 'Affordable plans for any business',
      monthly: 'Monthly',
      yearly: 'Yearly',
      save: 'Save',
      perMonth: '/month',
      selectPlan: 'Select Plan',
      popular: 'Popular',
      plans: [
        {
          name: 'Starter',
          price: '299',
          yearlyPrice: '2990',
          description: 'For small businesses',
          features: [
            'Up to 10 operators',
            'Basic CRM integration',
            'Email support',
            'Basic reports',
            'Cloud service',
          ],
        },
        {
          name: 'Professional',
          price: '899',
          yearlyPrice: '8990',
          description: 'For growing businesses',
          popular: true,
          features: [
            'Up to 50 operators',
            'Full CRM integration',
            '24/7 support',
            'Advanced analytics',
            'API access',
            'Multilingual service',
            'Custom training',
          ],
        },
        {
          name: 'Enterprise',
          price: 'Custom',
          yearlyPrice: 'Custom',
          description: 'For large enterprises',
          features: [
            'Unlimited operators',
            'Custom solutions',
            'Dedicated manager',
            'AI integration',
            'Custom development',
            'SLA guarantee',
            'Onsite training',
            'Premium support',
          ],
        },
      ],
    },
    partners: {
      title: 'Our Partners',
      subtitle: 'World\'s leading companies trust us',
    },
  },
  ru: {
    nav: {
      home: 'Главная',
      about: 'О нас',
      services: 'Услуги',
      products: 'Продукты',
      gallery: 'Галерея',
      team: 'Команда',
      pricing: 'Цены',
      features: 'Возможности',
      contact: 'Контакты',
    },
    hero: {
      title: 'Профессиональные решения телефонных продаж',
      subtitle: 'Современные услуги телефонных продаж и колл-центра для вашего международного бизнеса',
      cta: 'Связаться с нами',
      typingText: [
        'Взаимодействие с клиентами...',
        'Автоматизация продаж...',
        'Решения колл-центра...',
        'Международный сервис...',
      ],
    },
    about: {
      title: 'О нас',
      description: 'TeleSales Pro - ведущая компания в области телефонных продаж и работы с клиентами. Мы предоставляем профессиональные услуги, соответствующие международным стандартам, и помогаем вывести ваш бизнес на новый уровень.',
      stats: {
        clients: 'Клиентов',
        projects: 'Проектов',
        satisfaction: 'Удовлетворенность',
        countries: 'Стран',
      },
    },
    services: {
      title: 'Наши услуги',
      subtitle: 'Комплексные решения телефонных продаж',
      items: [
        {
          title: 'Телефонные продажи',
          description: 'Профессиональные услуги телефонных продаж и стратегии работы с клиентами',
        },
        {
          title: 'Колл-центр',
          description: 'Полностью оборудованные решения колл-центра и обучение операторов',
        },
        {
          title: 'CRM интеграция',
          description: 'Интеграция и автоматизация с современными CRM системами',
        },
        {
          title: 'Аналитика и отчеты',
          description: 'Подробная аналитика и статистика в реальном времени',
        },
        {
          title: 'Многоязычный сервис',
          description: 'Профессиональное обслуживание на 30+ языках',
        },
        {
          title: 'Консалтинг',
          description: 'Консультации по оптимизации процессов продаж',
        },
      ],
    },
    features: {
      title: 'Почему выбирают нас',
      subtitle: 'Наши конкурентные преимущества',
      items: [
        {
          title: 'Профессиональная команда',
          description: 'Опытные специалисты и сертифицированные операторы',
        },
        {
          title: 'Современные технологии',
          description: 'Новейшие системы колл-центра и AI решения',
        },
        {
          title: 'Поддержка 24/7',
          description: 'Постоянная техническая помощь и обслуживание клиентов',
        },
        {
          title: 'Международный опыт',
          description: 'Опыт работы с более чем 50 странами',
        },
      ],
    },
    contact: {
      title: 'Свяжитесь с нами',
      subtitle: 'Начните развивать свой бизнес сегодня',
      name: 'Ваше имя',
      email: 'Ваш Email',
      message: 'Ваше сообщение',
      send: 'Отправить',
      phone: '+998 90 123 45 67',
      address: 'Ташкент, Узбекистан',
    },
    chatbot: {
      title: 'Нужна помощь?',
      placeholder: 'Введите ваш вопрос...',
      send: 'Отправить',
      greeting: 'Здравствуйте! Чем могу вам помочь?',
    },
    products: {
      title: 'Наши продукты',
      subtitle: 'Современные решения для телефонных продаж',
      items: [
        {
          name: 'CallPro Enterprise',
          description: 'Профессиональная платформа колл-центра для крупного бизнеса',
          features: ['500+ операторов', 'AI аналитика', 'CRM интеграция', 'Мониторинг в реальном времени'],
        },
        {
          name: 'SalesMaster',
          description: 'Система автоматизации телефонных продаж',
          features: ['Автодозвон', 'Управление скриптами', 'Аналитика результатов', 'Отчеты'],
        },
        {
          name: 'CloudCall Lite',
          description: 'Решение для малого и среднего бизнеса',
          features: ['50+ операторов', 'Облачный сервис', 'Мобильное приложение', 'Доступная цена'],
        },
        {
          name: 'AI Assistant Pro',
          description: 'Виртуальный оператор на базе ИИ',
          features: ['30+ языков', 'Работа 24/7', 'Естественная речь', 'Способность к обучению'],
        },
      ],
    },
    gallery: {
      title: 'Галерея проектов',
      subtitle: 'Наши успешные проекты и клиенты',
      viewProject: 'Просмотреть проект',
    },
    team: {
      title: 'Наша команда',
      subtitle: 'Профессиональные специалисты и опытные руководители',
      members: [
        {
          name: 'Алишер Рахимов',
          position: 'Генеральный директор',
          bio: '15+ лет опыта в телефонных продажах',
        },
        {
          name: 'Мадина Каримова',
          position: 'Технический директор',
          bio: 'Специалист по AI и системам колл-центра',
        },
        {
          name: 'Даврон Турсунов',
          position: 'Директор по продажам',
          bio: 'Эксперт по международным рынкам и стратегии',
        },
        {
          name: 'Нилюфар Юнусова',
          position: 'Руководитель службы клиентов',
          bio: 'Удовлетворенность клиентов и развитие команды',
        },
      ],
    },
    testimonials: {
      title: 'Отзывы клиентов',
      subtitle: 'Что говорят о нас наши клиенты',
      items: [
        {
          name: 'Камол Абдуллаев',
          company: 'TechCorp Uzbekistan',
          role: 'Генеральный директор',
          content: 'Работа с TeleSales Pro увеличила наши продажи на 150%. Профессиональная команда и современные технологии!',
        },
        {
          name: 'Елена Петрова',
          company: 'Global Trade LLC',
          role: 'Директор по маркетингу',
          content: 'Отличный сервис и профессиональный подход. Внимание к каждой детали. Очень довольны!',
        },
        {
          name: 'Ахмад Каримов',
          company: 'Smart Solutions',
          role: 'Основатель',
          content: 'Лучшие решения для колл-центра. Поддержка 24/7 и высокое качество обслуживания. Рекомендую!',
        },
      ],
    },
    pricing: {
      title: 'Цены',
      subtitle: 'Доступные тарифы для любого бизнеса',
      monthly: 'Месяц',
      yearly: 'Год',
      save: 'Экономия',
      perMonth: '/мес',
      selectPlan: 'Выбрать план',
      popular: 'Популярный',
      plans: [
        {
          name: 'Starter',
          price: '299',
          yearlyPrice: '2990',
          description: 'Для малого бизнеса',
          features: [
            'До 10 операторов',
            'Базовая CRM интеграция',
            'Поддержка по Email',
            'Базовые отчеты',
            'Облачный сервис',
          ],
        },
        {
          name: 'Professional',
          price: '899',
          yearlyPrice: '8990',
          description: 'Для растущего бизнеса',
          popular: true,
          features: [
            'До 50 операторов',
            'Полная CRM интеграция',
            'Поддержка 24/7',
            'Расширенная аналитика',
            'API доступ',
            'Многоязычный сервис',
            'Индивидуальное обучение',
          ],
        },
        {
          name: 'Enterprise',
          price: 'Индивид.',
          yearlyPrice: 'Индивид.',
          description: 'Для крупных предприятий',
          features: [
            'Неограниченно операторов',
            'Индивидуальные решения',
            'Персональный менеджер',
            'AI интеграция',
            'Индивидуальная разработка',
            'SLA гарантия',
            'Обучение на месте',
            'Премиум поддержка',
          ],
        },
      ],
    },
    partners: {
      title: 'Наши партнеры',
      subtitle: 'Ведущие компании мира доверяют нам',
    },
  },
};

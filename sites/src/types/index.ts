export type Language = 'uz' | 'en' | 'ru';

export interface Translations {
  nav: {
    home: string;
    about: string;
    services: string;
    products: string;
    gallery: string;
    team: string;
    pricing: string;
    features: string;
    contact: string;
  };
  hero: {
    title: string;
    subtitle: string;
    cta: string;
    typingText: string[];
  };
  about: {
    title: string;
    description: string;
    stats: {
      clients: string;
      projects: string;
      satisfaction: string;
      countries: string;
    };
  };
  services: {
    title: string;
    subtitle: string;
    items: Array<{
      title: string;
      description: string;
    }>;
  };
  features: {
    title: string;
    subtitle: string;
    items: Array<{
      title: string;
      description: string;
    }>;
  };
  contact: {
    title: string;
    subtitle: string;
    name: string;
    email: string;
    message: string;
    send: string;
    phone: string;
    address: string;
  };
  chatbot: {
    title: string;
    placeholder: string;
    send: string;
    greeting: string;
  };
  products: {
    title: string;
    subtitle: string;
    items: Array<{
      name: string;
      description: string;
      features: string[];
    }>;
  };
  gallery: {
    title: string;
    subtitle: string;
    viewProject: string;
  };
  team: {
    title: string;
    subtitle: string;
    members: Array<{
      name: string;
      position: string;
      bio: string;
    }>;
  };
  testimonials: {
    title: string;
    subtitle: string;
    items: Array<{
      name: string;
      company: string;
      role: string;
      content: string;
    }>;
  };
  pricing: {
    title: string;
    subtitle: string;
    monthly: string;
    yearly: string;
    save: string;
    perMonth: string;
    selectPlan: string;
    popular: string;
    plans: Array<{
      name: string;
      price: string;
      yearlyPrice: string;
      description: string;
      popular?: boolean;
      features: string[];
    }>;
  };
  partners: {
    title: string;
    subtitle: string;
  };
}

export interface ChatMessage {
  role: 'user' | 'assistant';
  content: string;
}

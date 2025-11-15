import { Phone, Headphones, Database, BarChart, Globe, Lightbulb } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';

const icons = [Phone, Headphones, Database, BarChart, Globe, Lightbulb];

export function Services() {
  const { t } = useLanguage();

  return (
    <section id="services" className="section-padding">
      <div className="container-custom">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.services.title}</h2>
          <p className="text-lg text-muted-foreground max-w-3xl mx-auto">
            {t.services.subtitle}
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {t.services.items.map((service, index) => {
            const Icon = icons[index];
            return (
              <div
                key={index}
                className="group bg-card rounded-xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-border hover:border-primary cursor-pointer"
              >
                <div className="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                  <Icon className="w-7 h-7 text-primary group-hover:text-white transition-colors" />
                </div>
                <h3 className="text-xl font-bold mb-4 group-hover:text-primary transition-colors">
                  {service.title}
                </h3>
                <p className="text-muted-foreground leading-relaxed">
                  {service.description}
                </p>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}

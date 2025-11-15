import { CheckCircle, Zap, Clock, Globe } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';

const icons = [CheckCircle, Zap, Clock, Globe];

export function Features() {
  const { t } = useLanguage();

  return (
    <section id="features" className="section-padding bg-secondary/30">
      <div className="container-custom">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.features.title}</h2>
          <p className="text-lg text-muted-foreground max-w-3xl mx-auto">
            {t.features.subtitle}
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {t.features.items.map((feature, index) => {
            const Icon = icons[index];
            return (
              <div
                key={index}
                className="flex gap-6 bg-card rounded-xl p-8 shadow-lg hover:shadow-xl transition-all border border-border"
              >
                <div className="flex-shrink-0">
                  <div className="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <Icon className="w-6 h-6 text-primary" />
                  </div>
                </div>
                <div>
                  <h3 className="text-xl font-bold mb-3">{feature.title}</h3>
                  <p className="text-muted-foreground leading-relaxed">
                    {feature.description}
                  </p>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}

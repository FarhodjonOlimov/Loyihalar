import { Users, Target, TrendingUp, Award } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';

export function About() {
  const { t } = useLanguage();

  const stats = [
    { icon: Users, value: '500+', label: t.about.stats.clients },
    { icon: Target, value: '1000+', label: t.about.stats.projects },
    { icon: TrendingUp, value: '98%', label: t.about.stats.satisfaction },
    { icon: Award, value: '50+', label: t.about.stats.countries },
  ];

  return (
    <section id="about" className="section-padding bg-secondary/30">
      <div className="container-custom">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.about.title}</h2>
          <p className="text-lg text-muted-foreground max-w-3xl mx-auto">
            {t.about.description}
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {stats.map((stat, index) => {
            const Icon = stat.icon;
            return (
              <div
                key={index}
                className="bg-card rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow border border-border"
              >
                <div className="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Icon className="w-8 h-8 text-primary" />
                </div>
                <div className="text-4xl font-bold mb-2 text-primary">{stat.value}</div>
                <div className="text-muted-foreground">{stat.label}</div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}

import { Quote, Star } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';

const avatars = [
  'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop',
  'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200&h=200&fit=crop',
  'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&h=200&fit=crop',
];

export function Testimonials() {
  const { t } = useLanguage();

  return (
    <section className="section-padding bg-gradient-to-br from-primary/5 via-background to-secondary/10">
      <div className="container-custom">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.testimonials.title}</h2>
          <p className="text-lg text-muted-foreground max-w-3xl mx-auto">
            {t.testimonials.subtitle}
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {t.testimonials.items.map((testimonial, index) => (
            <div
              key={index}
              className="relative bg-card rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-border group"
            >
              <Quote className="absolute top-6 right-6 w-12 h-12 text-primary/10 group-hover:text-primary/20 transition-colors" />
              
              <div className="relative">
                <div className="flex gap-1 mb-4">
                  {[...Array(5)].map((_, i) => (
                    <Star key={i} className="w-5 h-5 fill-primary text-primary" />
                  ))}
                </div>

                <p className="text-muted-foreground mb-6 leading-relaxed italic">
                  "{testimonial.content}"
                </p>

                <div className="flex items-center gap-4">
                  <img
                    src={avatars[index]}
                    alt={testimonial.name}
                    className="w-14 h-14 rounded-full object-cover ring-2 ring-primary/20"
                  />
                  <div>
                    <h4 className="font-bold">{testimonial.name}</h4>
                    <p className="text-sm text-primary">{testimonial.role}</p>
                    <p className="text-xs text-muted-foreground">{testimonial.company}</p>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

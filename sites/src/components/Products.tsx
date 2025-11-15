import { Package, CheckCircle2, ArrowRight } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';
import { Button } from './ui/button';

export function Products() {
  const { t } = useLanguage();

  return (
    <section id="products" className="section-padding bg-gradient-to-br from-primary/5 via-background to-primary/5">
      <div className="container-custom">
        <div className="text-center mb-16">
          <div className="inline-flex items-center gap-2 bg-primary/10 px-4 py-2 rounded-full mb-6">
            <Package className="w-5 h-5 text-primary" />
            <span className="text-sm font-semibold text-primary">{t.products.title}</span>
          </div>
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.products.subtitle}</h2>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {t.products.items.map((product, index) => (
            <div
              key={index}
              className="group relative bg-card rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-border overflow-hidden"
            >
              <div className="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/20 to-transparent rounded-bl-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500" />
              
              <div className="relative">
                <div className="flex items-start justify-between mb-6">
                  <div>
                    <h3 className="text-2xl font-bold mb-2 group-hover:text-primary transition-colors">
                      {product.name}
                    </h3>
                    <p className="text-muted-foreground">
                      {product.description}
                    </p>
                  </div>
                  <div className="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center group-hover:bg-primary group-hover:scale-110 transition-all">
                    <Package className="w-6 h-6 text-primary group-hover:text-primary-foreground transition-colors" />
                  </div>
                </div>

                <div className="space-y-3 mb-6">
                  {product.features.map((feature, fIndex) => (
                    <div key={fIndex} className="flex items-center gap-3">
                      <CheckCircle2 className="w-5 h-5 text-primary flex-shrink-0" />
                      <span className="text-sm">{feature}</span>
                    </div>
                  ))}
                </div>

                <Button 
                  className="w-full group/btn"
                  variant={index === 1 ? "default" : "outline"}
                >
                  {t.contact.cta || 'Learn More'}
                  <ArrowRight className="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" />
                </Button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

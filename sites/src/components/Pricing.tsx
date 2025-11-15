import { useState } from 'react';
import { Check, Zap } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';
import { Button } from './ui/button';

export function Pricing() {
  const { t } = useLanguage();
  const [isYearly, setIsYearly] = useState(false);

  return (
    <section id="pricing" className="section-padding">
      <div className="container-custom">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.pricing.title}</h2>
          <p className="text-lg text-muted-foreground max-w-3xl mx-auto mb-8">
            {t.pricing.subtitle}
          </p>

          {/* Toggle */}
          <div className="inline-flex items-center gap-4 bg-secondary/50 p-2 rounded-full">
            <button
              onClick={() => setIsYearly(false)}
              className={`px-6 py-2 rounded-full transition-all ${
                !isYearly ? 'bg-primary text-primary-foreground shadow-lg' : 'text-muted-foreground'
              }`}
            >
              {t.pricing.monthly}
            </button>
            <button
              onClick={() => setIsYearly(true)}
              className={`px-6 py-2 rounded-full transition-all ${
                isYearly ? 'bg-primary text-primary-foreground shadow-lg' : 'text-muted-foreground'
              }`}
            >
              {t.pricing.yearly}
              <span className="ml-2 text-xs bg-green-500 text-white px-2 py-1 rounded-full">
                {t.pricing.save} 20%
              </span>
            </button>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {t.pricing.plans.map((plan, index) => (
            <div
              key={index}
              className={`relative rounded-2xl p-8 transition-all duration-300 ${
                plan.popular
                  ? 'bg-gradient-to-br from-primary to-primary/80 text-primary-foreground shadow-2xl scale-105 md:scale-110'
                  : 'bg-card border border-border shadow-lg hover:shadow-xl'
              }`}
            >
              {plan.popular && (
                <div className="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-4 py-1 rounded-full text-sm font-bold shadow-lg flex items-center gap-1">
                  <Zap className="w-4 h-4" />
                  {t.pricing.popular}
                </div>
              )}

              <div className="text-center mb-6">
                <h3 className={`text-2xl font-bold mb-2 ${plan.popular ? 'text-white' : ''}`}>
                  {plan.name}
                </h3>
                <p className={`text-sm mb-4 ${plan.popular ? 'text-white/80' : 'text-muted-foreground'}`}>
                  {plan.description}
                </p>
                <div className="flex items-end justify-center gap-1">
                  {plan.price !== 'Custom' && plan.price !== 'Maxsus' && plan.price !== 'Индивид.' ? (
                    <>
                      <span className={`text-4xl font-bold ${plan.popular ? 'text-white' : ''}`}>
                        ${isYearly ? plan.yearlyPrice : plan.price}
                      </span>
                      <span className={`text-sm mb-2 ${plan.popular ? 'text-white/60' : 'text-muted-foreground'}`}>
                        {t.pricing.perMonth}
                      </span>
                    </>
                  ) : (
                    <span className={`text-4xl font-bold ${plan.popular ? 'text-white' : ''}`}>
                      {plan.price}
                    </span>
                  )}
                </div>
              </div>

              <div className="space-y-3 mb-8">
                {plan.features.map((feature, fIndex) => (
                  <div key={fIndex} className="flex items-start gap-3">
                    <Check className={`w-5 h-5 flex-shrink-0 ${
                      plan.popular ? 'text-white' : 'text-primary'
                    }`} />
                    <span className={`text-sm ${plan.popular ? 'text-white/90' : ''}`}>
                      {feature}
                    </span>
                  </div>
                ))}
              </div>

              <Button
                className={`w-full ${
                  plan.popular
                    ? 'bg-white text-primary hover:bg-white/90'
                    : 'bg-primary text-primary-foreground hover:bg-primary/90'
                }`}
                size="lg"
              >
                {t.pricing.selectPlan}
              </Button>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

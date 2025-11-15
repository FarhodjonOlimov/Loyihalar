import { useLanguage } from '../hooks/useLanguage';

const partners = [
  { name: 'Microsoft', logo: 'https://img.logo.dev/microsoft.com?token=pk_X-1ZBIeiQg2elvY5bW1uVA' },
  { name: 'Google', logo: 'https://img.logo.dev/google.com?token=pk_X-1ZBIeiQg2elvY5bW1uVA' },
  { name: 'Amazon', logo: 'https://img.logo.dev/amazon.com?token=pk_X-1ZBIeiQg2elvY5bW1uVA' },
  { name: 'Salesforce', logo: 'https://img.logo.dev/salesforce.com?token=pk_X-1ZBIeiQg2elvY5bW1uVA' },
  { name: 'Oracle', logo: 'https://img.logo.dev/oracle.com?token=pk_X-1ZBIeiQg2elvY5bW1uVA' },
  { name: 'IBM', logo: 'https://img.logo.dev/ibm.com?token=pk_X-1ZBIeiQg2elvY5bW1uVA' },
];

export function Partners() {
  const { t } = useLanguage();

  return (
    <section className="section-padding bg-secondary/30">
      <div className="container-custom">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">{t.partners.title}</h2>
          <p className="text-muted-foreground">{t.partners.subtitle}</p>
        </div>

        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center">
          {partners.map((partner, index) => (
            <div
              key={index}
              className="flex items-center justify-center p-6 bg-card rounded-xl hover:shadow-lg transition-all duration-300 border border-border group"
            >
              <img
                src={partner.logo}
                alt={partner.name}
                className="h-12 w-auto object-contain grayscale group-hover:grayscale-0 transition-all opacity-60 group-hover:opacity-100"
              />
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

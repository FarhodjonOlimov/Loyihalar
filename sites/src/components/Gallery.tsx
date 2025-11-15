import { useState } from 'react';
import { Eye, ExternalLink } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';
import { Button } from './ui/button';

const projects = [
  {
    image: 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&h=600&fit=crop',
    title: 'International Bank Call Center',
    category: 'Banking',
    stats: '200+ Operators',
  },
  {
    image: 'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800&h=600&fit=crop',
    title: 'E-commerce Sales Platform',
    category: 'E-commerce',
    stats: '500K+ Calls/Month',
  },
  {
    image: 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800&h=600&fit=crop',
    title: 'Telecom Customer Support',
    category: 'Telecommunications',
    stats: '24/7 Support',
  },
  {
    image: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=600&fit=crop',
    title: 'Healthcare Appointment System',
    category: 'Healthcare',
    stats: '150+ Clinics',
  },
  {
    image: 'https://images.unsplash.com/photo-1551135049-8a33b5883817?w=800&h=600&fit=crop',
    title: 'Insurance Sales Campaign',
    category: 'Insurance',
    stats: '300% ROI',
  },
  {
    image: 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=800&h=600&fit=crop',
    title: 'Real Estate Lead Generation',
    category: 'Real Estate',
    stats: '1000+ Leads/Week',
  },
];

export function Gallery() {
  const { t } = useLanguage();
  const [hoveredIndex, setHoveredIndex] = useState<number | null>(null);

  return (
    <section id="gallery" className="section-padding bg-secondary/20">
      <div className="container-custom">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.gallery.title}</h2>
          <p className="text-lg text-muted-foreground max-w-3xl mx-auto">
            {t.gallery.subtitle}
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {projects.map((project, index) => (
            <div
              key={index}
              className="group relative aspect-[4/3] rounded-2xl overflow-hidden cursor-pointer"
              onMouseEnter={() => setHoveredIndex(index)}
              onMouseLeave={() => setHoveredIndex(null)}
            >
              <img
                src={project.image}
                alt={project.title}
                className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
              />
              
              <div className={`absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent transition-opacity duration-300 ${
                hoveredIndex === index ? 'opacity-100' : 'opacity-60'
              }`}>
                <div className="absolute bottom-0 left-0 right-0 p-6 transform transition-transform duration-300 group-hover:translate-y-0 translate-y-2">
                  <div className="inline-block bg-primary/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs text-white mb-3">
                    {project.category}
                  </div>
                  <h3 className="text-xl font-bold text-white mb-2">{project.title}</h3>
                  <p className="text-sm text-white/80 mb-4">{project.stats}</p>
                  
                  <div className={`flex gap-2 transition-all duration-300 ${
                    hoveredIndex === index ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'
                  }`}>
                    <Button size="sm" variant="secondary" className="gap-2">
                      <Eye className="w-4 h-4" />
                      {t.gallery.viewProject}
                    </Button>
                    <Button size="sm" variant="ghost" className="text-white hover:bg-white/20">
                      <ExternalLink className="w-4 h-4" />
                    </Button>
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

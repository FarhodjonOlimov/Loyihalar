import { Linkedin, Mail } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';
import { Button } from './ui/button';

const avatars = [
  'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
  'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
  'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop',
  'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop',
];

export function Team() {
  const { t } = useLanguage();

  return (
    <section id="team" className="section-padding">
      <div className="container-custom">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.team.title}</h2>
          <p className="text-lg text-muted-foreground max-w-3xl mx-auto">
            {t.team.subtitle}
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {t.team.members.map((member, index) => (
            <div
              key={index}
              className="group relative bg-card rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-border"
            >
              <div className="aspect-square overflow-hidden">
                <img
                  src={avatars[index]}
                  alt={member.name}
                  className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
              </div>
              
              <div className="p-6">
                <h3 className="text-xl font-bold mb-1 group-hover:text-primary transition-colors">
                  {member.name}
                </h3>
                <p className="text-sm text-primary font-semibold mb-3">
                  {member.position}
                </p>
                <p className="text-sm text-muted-foreground mb-4 leading-relaxed">
                  {member.bio}
                </p>
                
                <div className="flex gap-2">
                  <Button size="sm" variant="outline" className="flex-1">
                    <Linkedin className="w-4 h-4" />
                  </Button>
                  <Button size="sm" variant="outline" className="flex-1">
                    <Mail className="w-4 h-4" />
                  </Button>
                </div>
              </div>

              <div className="absolute top-4 right-4 w-12 h-12 bg-primary/90 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <span className="text-white font-bold text-lg">★</span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

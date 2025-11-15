import { useEffect, useState, useRef } from 'react';
import { TrendingUp, Users, Award, Globe } from 'lucide-react';
import { useLanguage } from '../hooks/useLanguage';

const stats = [
  { icon: Users, end: 500, suffix: '+', label: 'clients' },
  { icon: TrendingUp, end: 1000, suffix: '+', label: 'projects' },
  { icon: Award, end: 98, suffix: '%', label: 'satisfaction' },
  { icon: Globe, end: 50, suffix: '+', label: 'countries' },
];

function useCountUp(end: number, duration: number = 2000, shouldStart: boolean) {
  const [count, setCount] = useState(0);

  useEffect(() => {
    if (!shouldStart) return;

    let startTime: number | null = null;
    const step = (timestamp: number) => {
      if (!startTime) startTime = timestamp;
      const progress = Math.min((timestamp - startTime) / duration, 1);
      setCount(Math.floor(progress * end));
      if (progress < 1) {
        requestAnimationFrame(step);
      }
    };
    requestAnimationFrame(step);
  }, [end, duration, shouldStart]);

  return count;
}

export function Stats() {
  const { t } = useLanguage();
  const [isVisible, setIsVisible] = useState(false);
  const sectionRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setIsVisible(true);
        }
      },
      { threshold: 0.3 }
    );

    if (sectionRef.current) {
      observer.observe(sectionRef.current);
    }

    return () => observer.disconnect();
  }, []);

  return (
    <section ref={sectionRef} className="section-padding gradient-bg text-white">
      <div className="container-custom">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
          {stats.map((stat, index) => {
            const Icon = stat.icon;
            const count = useCountUp(stat.end, 2000, isVisible);
            
            return (
              <div
                key={index}
                className="text-center transform transition-all duration-500 hover:scale-110"
                style={{ transitionDelay: `${index * 100}ms` }}
              >
                <div className="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-full mb-4">
                  <Icon className="w-8 h-8" />
                </div>
                <div className="text-4xl md:text-5xl font-bold mb-2">
                  {count}{stat.suffix}
                </div>
                <div className="text-white/80 text-sm md:text-base">
                  {t.about.stats[stat.label as keyof typeof t.about.stats]}
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}

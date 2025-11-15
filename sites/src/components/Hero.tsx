import { useState, useEffect } from 'react';
import { ArrowRight, Keyboard } from 'lucide-react';
import { Button } from './ui/button';
import { useLanguage } from '../hooks/useLanguage';

export function Hero() {
  const { t } = useLanguage();
  const [typingIndex, setTypingIndex] = useState(0);
  const [displayText, setDisplayText] = useState('');
  const [isDeleting, setIsDeleting] = useState(false);
  const typingTexts = t.hero.typingText;

  useEffect(() => {
    const currentText = typingTexts[typingIndex];
    const timeout = setTimeout(
      () => {
        if (!isDeleting) {
          if (displayText.length < currentText.length) {
            setDisplayText(currentText.slice(0, displayText.length + 1));
          } else {
            setTimeout(() => setIsDeleting(true), 2000);
          }
        } else {
          if (displayText.length > 0) {
            setDisplayText(displayText.slice(0, -1));
          } else {
            setIsDeleting(false);
            setTypingIndex((prev) => (prev + 1) % typingTexts.length);
          }
        }
      },
      isDeleting ? 50 : 100
    );

    return () => clearTimeout(timeout);
  }, [displayText, isDeleting, typingIndex, typingTexts]);

  return (
    <section id="home" className="relative min-h-screen flex items-center overflow-hidden">
      {/* Animated Background */}
      <div className="absolute inset-0 gradient-bg">
        <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1920&h=1080&fit=crop')] bg-cover bg-center opacity-10"></div>
      </div>

      {/* Floating Elements */}
      <div className="absolute inset-0 overflow-hidden pointer-events-none">
        {[...Array(20)].map((_, i) => (
          <div
            key={i}
            className="absolute w-2 h-2 bg-white/20 rounded-full animate-pulse"
            style={{
              left: `${Math.random() * 100}%`,
              top: `${Math.random() * 100}%`,
              animationDelay: `${Math.random() * 3}s`,
              animationDuration: `${2 + Math.random() * 3}s`,
            }}
          />
        ))}
      </div>

      {/* Content */}
      <div className="container-custom relative z-10 section-padding">
        <div className="max-w-4xl mx-auto text-center text-white">
          {/* Keyboard Icon Animation */}
          <div className="mb-8 inline-block animate-pulse-glow">
            <Keyboard className="w-20 h-20 mx-auto text-white/90" />
          </div>

          {/* Main Title */}
          <h1 className="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 animate-fade-in">
            {t.hero.title}
          </h1>

          {/* Typing Animation */}
          <div className="h-16 mb-8 flex items-center justify-center">
            <span className="text-xl md:text-2xl font-mono text-white/90">
              {displayText}
              <span className="inline-block w-0.5 h-6 ml-1 bg-white animate-blink"></span>
            </span>
          </div>

          {/* Subtitle */}
          <p className="text-lg md:text-xl text-white/80 mb-12 max-w-2xl mx-auto animate-fade-in">
            {t.hero.subtitle}
          </p>

          {/* CTA Button */}
          <Button
            size="lg"
            className="bg-white text-primary hover:bg-white/90 text-lg px-8 py-6 h-auto animate-fade-in"
            asChild
          >
            <a href="#contact">
              {t.hero.cta}
              <ArrowRight className="ml-2 w-5 h-5" />
            </a>
          </Button>

          {/* Stats */}
          <div className="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 animate-fade-in">
            {[
              { value: '500+', label: t.about.stats.clients },
              { value: '1000+', label: t.about.stats.projects },
              { value: '98%', label: t.about.stats.satisfaction },
              { value: '50+', label: t.about.stats.countries },
            ].map((stat, index) => (
              <div key={index} className="text-center">
                <div className="text-3xl md:text-4xl font-bold mb-2">{stat.value}</div>
                <div className="text-sm md:text-base text-white/70">{stat.label}</div>
              </div>
            ))}
          </div>
        </div>
      </div>

      {/* Wave Divider */}
      <div className="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" className="w-full h-auto">
          <path
            fill="hsl(var(--background))"
            d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"
          />
        </svg>
      </div>
    </section>
  );
}

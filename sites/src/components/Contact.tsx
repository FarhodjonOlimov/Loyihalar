import { useState } from 'react';
import { Mail, Phone, MapPin, Send } from 'lucide-react';
import { Button } from './ui/button';
import { Input } from './ui/input';
import { Textarea } from './ui/textarea';
import { useToast } from './ui/use-toast';
import { useLanguage } from '../hooks/useLanguage';

export function Contact() {
  const { t } = useLanguage();
  const { toast } = useToast();
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    message: '',
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    toast({
      title: 'Message sent!',
      description: 'We will get back to you soon.',
    });
    setFormData({ name: '', email: '', message: '' });
  };

  return (
    <section id="contact" className="section-padding">
      <div className="container-custom">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-bold mb-6">{t.contact.title}</h2>
          <p className="text-lg text-muted-foreground max-w-3xl mx-auto">
            {t.contact.subtitle}
          </p>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
          {/* Contact Info */}
          <div className="space-y-8">
            <div className="flex items-start gap-4">
              <div className="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                <Phone className="w-6 h-6 text-primary" />
              </div>
              <div>
                <h3 className="font-bold mb-2">{t.nav.contact}</h3>
                <p className="text-muted-foreground">{t.contact.phone}</p>
              </div>
            </div>

            <div className="flex items-start gap-4">
              <div className="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                <Mail className="w-6 h-6 text-primary" />
              </div>
              <div>
                <h3 className="font-bold mb-2">Email</h3>
                <p className="text-muted-foreground">info@telesalespro.uz</p>
              </div>
            </div>

            <div className="flex items-start gap-4">
              <div className="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                <MapPin className="w-6 h-6 text-primary" />
              </div>
              <div>
                <h3 className="font-bold mb-2">{t.contact.address.split(',')[0]}</h3>
                <p className="text-muted-foreground">{t.contact.address}</p>
              </div>
            </div>

            <div className="bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl p-8 mt-8">
              <h3 className="text-xl font-bold mb-4">24/7 {t.features.items[2].title}</h3>
              <p className="text-muted-foreground">
                {t.features.items[2].description}
              </p>
            </div>
          </div>

          {/* Contact Form */}
          <form onSubmit={handleSubmit} className="space-y-6">
            <div>
              <Input
                placeholder={t.contact.name}
                value={formData.name}
                onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                required
                className="h-12"
              />
            </div>

            <div>
              <Input
                type="email"
                placeholder={t.contact.email}
                value={formData.email}
                onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                required
                className="h-12"
              />
            </div>

            <div>
              <Textarea
                placeholder={t.contact.message}
                value={formData.message}
                onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                required
                className="min-h-[200px] resize-none"
              />
            </div>

            <Button type="submit" size="lg" className="w-full h-12 text-lg">
              {t.contact.send}
              <Send className="ml-2 w-5 h-5" />
            </Button>
          </form>
        </div>
      </div>
    </section>
  );
}

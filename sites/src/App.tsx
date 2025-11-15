import { Header } from './components/Header';
import { Hero } from './components/Hero';
import { About } from './components/About';
import { Stats } from './components/Stats';
import { Services } from './components/Services';
import { Products } from './components/Products';
import { Gallery } from './components/Gallery';
import { Team } from './components/Team';
import { Testimonials } from './components/Testimonials';
import { Pricing } from './components/Pricing';
import { Features } from './components/Features';
import { Partners } from './components/Partners';
import { Contact } from './components/Contact';
import { Chatbot } from './components/Chatbot';
import { LanguageProvider } from './hooks/useLanguage';
import { Toaster } from './components/ui/toaster';

function App() {
  return (
    <LanguageProvider>
      <div className="min-h-screen">
        <Header />
        <main>
          <Hero />
          <About />
          <Stats />
          <Services />
          <Products />
          <Gallery />
          <Team />
          <Testimonials />
          <Pricing />
          <Features />
          <Partners />
          <Contact />
        </main>
        <Chatbot />
        <Toaster />
      </div>
    </LanguageProvider>
  );
}

export default App;

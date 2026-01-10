import { motion, useReducedMotion } from "framer-motion";
import { Link } from "react-router-dom";
import { MessageSquare, Book, Mail, ArrowRight, Zap, Headphones, FileText } from "lucide-react";
import { useEffect, useRef } from "react";

const ctaCards = [
  {
    icon: Headphones,
    title: "24/7 Support",
    description: "Expert help whenever you need it. Average response time under 5 minutes.",
    link: "/panel/tickets/new",
    linkText: "Open a Ticket",
    gradient: "from-blue-500/20 to-cyan-500/20",
    iconColor: "text-cyan-400",
  },
  {
    icon: Book,
    title: "Knowledge Base",
    description: "Tutorials, guides, and troubleshooting articles for self-service help.",
    link: "/knowledge-base",
    linkText: "Browse Articles",
    gradient: "from-purple-500/20 to-pink-500/20",
    iconColor: "text-purple-400",
  },
  {
    icon: Mail,
    title: "Custom Solutions",
    description: "Need something specific? Let's discuss your requirements.",
    link: "/contact",
    linkText: "Contact Sales",
    gradient: "from-amber-500/20 to-orange-500/20",
    iconColor: "text-amber-400",
  },
];

// REGRESSION FIX: The previous canvas background caused full-screen flicker on some GPUs
// due to layout-thrashing getBoundingClientRect() on every frame + repeated ctx.scale()
// without resetting transforms during resize. We now use a ResizeObserver, cache bounds,
// reset transforms on resize, and guarantee a single RAF loop.
function AnimatedBackground({ enabled = true }: { enabled?: boolean }) {
  const canvasRef = useRef<HTMLCanvasElement>(null);
  const prefersReducedMotion = useReducedMotion();
  const particlesRef = useRef<
    Array<{ x: number; y: number; vx: number; vy: number; radius: number; opacity: number }>
  >([]);
  const animationRef = useRef<number>(0);
  const sizeRef = useRef({ width: 0, height: 0, dpr: 1 });

  useEffect(() => {
    if (!enabled || prefersReducedMotion) return;

    const canvas = canvasRef.current;
    if (!canvas) return;

    const ctx = canvas.getContext("2d", { alpha: true });
    if (!ctx) return;

    const createParticles = () => {
      const { width, height } = sizeRef.current;
      const count = Math.min(28, Math.floor((width * height) / 22000));
      const next: typeof particlesRef.current = [];

      for (let i = 0; i < count; i++) {
        next.push({
          x: Math.random() * width,
          y: Math.random() * height,
          vx: (Math.random() - 0.5) * 0.25,
          vy: (Math.random() - 0.5) * 0.25,
          radius: Math.random() * 1.5 + 0.6,
          opacity: Math.random() * 0.35 + 0.1,
        });
      }

      particlesRef.current = next;
    };

    const setCanvasSize = (width: number, height: number) => {
      const dpr = Math.min(2, window.devicePixelRatio || 1);
      sizeRef.current = { width, height, dpr };

      canvas.width = Math.max(1, Math.floor(width * dpr));
      canvas.height = Math.max(1, Math.floor(height * dpr));

      // Important: reset transform before applying DPR scaling
      ctx.setTransform(1, 0, 0, 1, 0, 0);
      ctx.scale(dpr, dpr);
    };

    const draw = () => {
      const { width, height } = sizeRef.current;
      if (width <= 0 || height <= 0) {
        animationRef.current = requestAnimationFrame(draw);
        return;
      }

      ctx.clearRect(0, 0, width, height);
      const particles = particlesRef.current;

      // Connections
      for (let i = 0; i < particles.length; i++) {
        const p1 = particles[i];
        for (let j = i + 1; j < particles.length; j++) {
          const p2 = particles[j];
          const dx = p1.x - p2.x;
          const dy = p1.y - p2.y;
          const distance = Math.sqrt(dx * dx + dy * dy);
          if (distance < 120) {
            ctx.beginPath();
            ctx.moveTo(p1.x, p1.y);
            ctx.lineTo(p2.x, p2.y);
            ctx.strokeStyle = `rgba(25, 195, 255, ${0.09 * (1 - distance / 120)})`;
            ctx.lineWidth = 0.5;
            ctx.stroke();
          }
        }
      }

      // Particles
      for (const p of particles) {
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(25, 195, 255, ${p.opacity})`;
        ctx.fill();

        p.x += p.vx;
        p.y += p.vy;
        if (p.x < 0 || p.x > width) p.vx *= -1;
        if (p.y < 0 || p.y > height) p.vy *= -1;
      }

      animationRef.current = requestAnimationFrame(draw);
    };

    // Observe element size without reading layout on every frame
    const ro = new ResizeObserver((entries) => {
      const entry = entries[0];
      if (!entry) return;

      const cr = entry.contentRect;
      const nextW = Math.floor(cr.width);
      const nextH = Math.floor(cr.height);
      const { width: prevW, height: prevH } = sizeRef.current;

      if (nextW !== prevW || nextH !== prevH) {
        setCanvasSize(nextW, nextH);
        createParticles();
      }
    });

    ro.observe(canvas);

    // Prime size immediately
    const rect = canvas.getBoundingClientRect();
    setCanvasSize(Math.floor(rect.width), Math.floor(rect.height));
    createParticles();

    cancelAnimationFrame(animationRef.current);
    animationRef.current = requestAnimationFrame(draw);

    return () => {
      ro.disconnect();
      cancelAnimationFrame(animationRef.current);
    };
  }, [enabled, prefersReducedMotion]);

  if (!enabled || prefersReducedMotion) {
    return (
      <div className="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-primary/5 pointer-events-none" />
    );
  }

  return (
    <canvas
      ref={canvasRef}
      className="absolute inset-0 w-full h-full pointer-events-none"
      style={{ opacity: 0.55 }}
    />
  );
}

export function CTASection() {
  const prefersReducedMotion = useReducedMotion();

  // Diagnostic switches (safe in production):
  // - ?disableCta=1 to disable the whole section
  // - ?ctaBg=0 to disable the animated background layer
  const params = typeof window !== "undefined" ? new URLSearchParams(window.location.search) : null;
  const disableCta = params?.get("disableCta") === "1";
  const enableBg = params?.get("ctaBg") !== "0";

  if (disableCta) return null;

  return (
    <section className="py-20 md:py-28 relative overflow-hidden">
      {/* Animated Background */}
      <AnimatedBackground enabled={enableBg} />
      
      {/* Gradient overlays */}
      <div className="absolute inset-0 bg-gradient-to-b from-background via-transparent to-background pointer-events-none" />
      
      <div className="container mx-auto px-4 md:px-6 relative">
        {/* Header */}
        <motion.div
          initial={prefersReducedMotion ? {} : { opacity: 0, y: 20 }}
          whileInView={prefersReducedMotion ? {} : { opacity: 1, y: 0 }}
          transition={{ duration: 0.5 }}
          viewport={{ once: true }}
          className="text-center mb-12"
        >
          <div className="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 border border-primary/20 mb-4">
            <Zap className="w-4 h-4 text-primary" />
            <span className="text-sm font-medium text-primary">Get Started</span>
          </div>
          <h2 className="text-3xl md:text-4xl lg:text-5xl font-bold text-foreground mb-4">
            Ready to <span className="text-primary">Level Up</span> Your Hosting?
          </h2>
          <p className="text-muted-foreground max-w-2xl mx-auto text-lg">
            Whether you have questions, need support, or want to discuss a custom solution, 
            we're here to help you succeed.
          </p>
        </motion.div>

        {/* CTA Cards Grid */}
        <div className="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto mb-12">
          {ctaCards.map((card, index) => (
            <motion.div
              key={card.title}
              initial={prefersReducedMotion ? {} : { opacity: 0, y: 30 }}
              whileInView={prefersReducedMotion ? {} : { opacity: 1, y: 0 }}
              transition={{ duration: 0.5, delay: index * 0.1 }}
              viewport={{ once: true }}
            >
              <Link
                to={card.link}
                className="group block h-full p-6 rounded-2xl bg-card/80 backdrop-blur-sm border border-border/50 hover:border-primary/40 transition-all duration-300 hover:shadow-xl hover:shadow-primary/5 hover:-translate-y-1"
              >
                {/* Icon with gradient background */}
                <div className={`w-14 h-14 rounded-xl bg-gradient-to-br ${card.gradient} flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300`}>
                  <card.icon className={`w-7 h-7 ${card.iconColor}`} />
                </div>
                
                <h3 className="text-xl font-semibold text-foreground mb-2 group-hover:text-primary transition-colors">
                  {card.title}
                </h3>
                <p className="text-muted-foreground text-sm mb-5 leading-relaxed">
                  {card.description}
                </p>
                
                <div className="flex items-center gap-2 text-primary font-medium text-sm">
                  {card.linkText}
                  <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                </div>
              </Link>
            </motion.div>
          ))}
        </div>

        {/* Main CTA */}
        <motion.div
          initial={prefersReducedMotion ? {} : { opacity: 0, y: 20 }}
          whileInView={prefersReducedMotion ? {} : { opacity: 1, y: 0 }}
          transition={{ duration: 0.5, delay: 0.3 }}
          viewport={{ once: true }}
          className="text-center"
        >
          <div className="inline-flex flex-col sm:flex-row items-center gap-4">
            <Link
              to="/game-servers"
              className="px-8 py-4 rounded-xl bg-primary text-primary-foreground font-semibold text-lg hover:bg-primary/90 transition-all duration-200 shadow-[0_0_30px_rgba(25,195,255,0.3)] hover:shadow-[0_0_40px_rgba(25,195,255,0.4)] flex items-center gap-2"
            >
              Browse Game Servers
              <ArrowRight className="w-5 h-5" />
            </Link>
            <Link
              to="/contact"
              className="px-8 py-4 rounded-xl border border-border/50 hover:border-primary/50 text-foreground font-semibold text-lg hover:text-primary transition-all duration-200 flex items-center gap-2"
            >
              <MessageSquare className="w-5 h-5" />
              Talk to Sales
            </Link>
          </div>
          <p className="text-sm text-muted-foreground mt-6">
            No credit card required • Instant setup • 24/7 support
          </p>
        </motion.div>
      </div>
    </section>
  );
}

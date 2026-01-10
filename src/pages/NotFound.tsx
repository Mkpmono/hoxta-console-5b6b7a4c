import { useLocation, Link } from "react-router-dom";
import { useEffect, useRef } from "react";
import { motion, useReducedMotion } from "framer-motion";
import { 
  Home, 
  Server, 
  Gamepad2, 
  Globe, 
  HardDrive, 
  Headphones, 
  Activity,
  ArrowRight,
  ExternalLink
} from "lucide-react";
import { Button } from "@/components/ui/button";

// Quick navigation links
const quickLinks = [
  { label: "Game Servers", href: "/game-servers", icon: Gamepad2 },
  { label: "VPS Hosting", href: "/vps-hosting", icon: Server },
  { label: "Web Hosting", href: "/web-hosting", icon: Globe },
  { label: "Dedicated Servers", href: "/dedicated-servers", icon: HardDrive },
  { label: "Server Status", href: "/status", icon: Activity },
];

// Animated network background
function NetworkBackground() {
  const canvasRef = useRef<HTMLCanvasElement>(null);
  const prefersReducedMotion = useReducedMotion();
  const animationRef = useRef<number>(0);
  const nodesRef = useRef<Array<{
    x: number;
    y: number;
    vx: number;
    vy: number;
    radius: number;
    opacity: number;
    pulsePhase: number;
  }>>([]);
  const initializedRef = useRef(false);

  useEffect(() => {
    if (prefersReducedMotion) return;

    const canvas = canvasRef.current;
    if (!canvas) return;

    const ctx = canvas.getContext("2d");
    if (!ctx) return;

    const resize = () => {
      const rect = canvas.getBoundingClientRect();
      canvas.width = rect.width * 2;
      canvas.height = rect.height * 2;
      ctx.scale(2, 2);
    };

    const createNodes = () => {
      const rect = canvas.getBoundingClientRect();
      const count = Math.min(40, Math.floor((rect.width * rect.height) / 15000));
      nodesRef.current = [];
      
      for (let i = 0; i < count; i++) {
        nodesRef.current.push({
          x: Math.random() * rect.width,
          y: Math.random() * rect.height,
          vx: (Math.random() - 0.5) * 0.2,
          vy: (Math.random() - 0.5) * 0.2,
          radius: Math.random() * 2 + 1,
          opacity: Math.random() * 0.5 + 0.2,
          pulsePhase: Math.random() * Math.PI * 2,
        });
      }
    };

    const draw = () => {
      const rect = canvas.getBoundingClientRect();
      ctx.clearRect(0, 0, rect.width, rect.height);
      const nodes = nodesRef.current;
      const time = Date.now() * 0.001;

      // Draw connections first (so nodes appear on top)
      nodes.forEach((n1, i) => {
        nodes.slice(i + 1).forEach((n2) => {
          const dx = n1.x - n2.x;
          const dy = n1.y - n2.y;
          const distance = Math.sqrt(dx * dx + dy * dy);
          
          if (distance < 150) {
            const opacity = 0.15 * (1 - distance / 150);
            ctx.beginPath();
            ctx.moveTo(n1.x, n1.y);
            ctx.lineTo(n2.x, n2.y);
            ctx.strokeStyle = `rgba(25, 195, 255, ${opacity})`;
            ctx.lineWidth = 0.5;
            ctx.stroke();
          }
        });
      });

      // Draw nodes with pulsing effect
      nodes.forEach((node) => {
        const pulse = Math.sin(time * 2 + node.pulsePhase) * 0.3 + 0.7;
        const currentOpacity = node.opacity * pulse;
        const currentRadius = node.radius * (0.8 + pulse * 0.4);

        // Outer glow
        ctx.beginPath();
        ctx.arc(node.x, node.y, currentRadius * 3, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(25, 195, 255, ${currentOpacity * 0.1})`;
        ctx.fill();

        // Core node
        ctx.beginPath();
        ctx.arc(node.x, node.y, currentRadius, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(25, 195, 255, ${currentOpacity})`;
        ctx.fill();

        // Update position
        node.x += node.vx;
        node.y += node.vy;

        // Bounce off edges
        if (node.x < 0 || node.x > rect.width) node.vx *= -1;
        if (node.y < 0 || node.y > rect.height) node.vy *= -1;
      });

      animationRef.current = requestAnimationFrame(draw);
    };

    if (!initializedRef.current) {
      resize();
      createNodes();
      initializedRef.current = true;
    }
    draw();

    const handleResize = () => {
      resize();
      const rect = canvas.getBoundingClientRect();
      const expectedCount = Math.min(40, Math.floor((rect.width * rect.height) / 15000));
      if (Math.abs(nodesRef.current.length - expectedCount) > 5) {
        createNodes();
      }
    };

    window.addEventListener("resize", handleResize);

    return () => {
      cancelAnimationFrame(animationRef.current);
      window.removeEventListener("resize", handleResize);
    };
  }, [prefersReducedMotion]);

  if (prefersReducedMotion) {
    return (
      <div className="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-primary/5 pointer-events-none" />
    );
  }

  return (
    <canvas
      ref={canvasRef}
      className="absolute inset-0 w-full h-full pointer-events-none"
      style={{ opacity: 0.8 }}
    />
  );
}

const NotFound = () => {
  const location = useLocation();
  const prefersReducedMotion = useReducedMotion();

  useEffect(() => {
    console.error("404 Error: User attempted to access non-existent route:", location.pathname);
  }, [location.pathname]);

  return (
    <div className="relative min-h-screen bg-background flex items-center justify-center overflow-hidden">
      {/* Animated network background */}
      <NetworkBackground />
      
      {/* Gradient overlays */}
      <div className="absolute inset-0 bg-gradient-to-b from-background via-transparent to-background pointer-events-none" />
      <div className="absolute top-1/3 left-1/4 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[150px] pointer-events-none" />
      <div className="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-primary/3 rounded-full blur-[120px] pointer-events-none" />
      
      <div className="container mx-auto px-4 py-16 relative z-10">
        <div className="max-w-3xl mx-auto text-center">
          {/* 404 Badge */}
          <motion.div
            initial={prefersReducedMotion ? {} : { opacity: 0, scale: 0.8 }}
            animate={prefersReducedMotion ? {} : { opacity: 1, scale: 1 }}
            transition={{ duration: 0.5 }}
            className="mb-8"
          >
            <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-destructive/10 border border-destructive/30 text-destructive">
              <Activity className="w-4 h-4" />
              <span className="text-sm font-medium">Connection Lost</span>
            </div>
          </motion.div>

          {/* 404 Number */}
          <motion.div
            initial={prefersReducedMotion ? {} : { opacity: 0, y: 20 }}
            animate={prefersReducedMotion ? {} : { opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="mb-6"
          >
            <h1 className="text-8xl md:text-9xl font-bold text-primary/20 select-none relative">
              404
              <span className="absolute inset-0 text-primary blur-lg opacity-30">404</span>
            </h1>
          </motion.div>

          {/* Message */}
          <motion.div
            initial={prefersReducedMotion ? {} : { opacity: 0, y: 20 }}
            animate={prefersReducedMotion ? {} : { opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="mb-8"
          >
            <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-4">
              Route Not Found
            </h2>
            <p className="text-muted-foreground text-lg max-w-lg mx-auto">
              The server endpoint you requested doesn't exist or has been moved. 
              Check the URL or navigate back to a known location.
            </p>
            <p className="text-sm text-muted-foreground/60 mt-2 font-mono">
              Requested: {location.pathname}
            </p>
          </motion.div>

          {/* Primary CTAs */}
          <motion.div
            initial={prefersReducedMotion ? {} : { opacity: 0, y: 20 }}
            animate={prefersReducedMotion ? {} : { opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.3 }}
            className="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12"
          >
            <Link to="/">
              <Button className="btn-glow group px-8 py-6 text-lg">
                <Home className="w-5 h-5 mr-2" />
                Back to Home
                <ArrowRight className="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" />
              </Button>
            </Link>
            <Link to="/panel/tickets/new">
              <Button variant="outline" className="btn-outline px-8 py-6 text-lg">
                <Headphones className="w-5 h-5 mr-2" />
                Contact Support
              </Button>
            </Link>
          </motion.div>

          {/* Quick Links */}
          <motion.div
            initial={prefersReducedMotion ? {} : { opacity: 0, y: 20 }}
            animate={prefersReducedMotion ? {} : { opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.4 }}
            className="glass-card p-6 rounded-2xl border border-border/30"
          >
            <h3 className="text-sm font-medium text-muted-foreground mb-4 uppercase tracking-wider">
              Quick Navigation
            </h3>
            <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">
              {quickLinks.map((link, index) => (
                <motion.div
                  key={link.href}
                  initial={prefersReducedMotion ? {} : { opacity: 0, y: 10 }}
                  animate={prefersReducedMotion ? {} : { opacity: 1, y: 0 }}
                  transition={{ duration: 0.4, delay: 0.5 + index * 0.05 }}
                >
                  <Link
                    to={link.href}
                    className="flex flex-col items-center gap-2 p-4 rounded-xl bg-card/50 border border-border/30 hover:border-primary/30 hover:bg-primary/5 transition-all duration-200 group"
                  >
                    <link.icon className="w-5 h-5 text-muted-foreground group-hover:text-primary transition-colors" />
                    <span className="text-sm text-muted-foreground group-hover:text-foreground transition-colors">
                      {link.label}
                    </span>
                  </Link>
                </motion.div>
              ))}
            </div>
          </motion.div>

          {/* Status Link */}
          <motion.div
            initial={prefersReducedMotion ? {} : { opacity: 0 }}
            animate={prefersReducedMotion ? {} : { opacity: 1 }}
            transition={{ duration: 0.6, delay: 0.8 }}
            className="mt-8"
          >
            <Link 
              to="/status" 
              className="inline-flex items-center gap-2 text-sm text-muted-foreground hover:text-primary transition-colors"
            >
              <Activity className="w-4 h-4" />
              Check server status
              <ExternalLink className="w-3 h-3" />
            </Link>
          </motion.div>
        </div>
      </div>
    </div>
  );
};

export default NotFound;

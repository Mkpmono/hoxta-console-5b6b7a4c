import { useEffect, useState, useRef, useCallback } from "react";
import { motion } from "framer-motion";
import { Check } from "lucide-react";

interface Blip {
  id: number;
  x: number;
  y: number;
  delay: number;
}

export function AntiDDoSSection() {
  const [blips, setBlips] = useState<Blip[]>([]);
  const [sweepAngle, setSweepAngle] = useState(0);
  const animationRef = useRef<number>();

  const generateBlips = useCallback(() => {
    const newBlips: Blip[] = [];
    for (let i = 0; i < 4; i++) {
      const angle = Math.random() * Math.PI * 2;
      const radius = 20 + Math.random() * 25;
      newBlips.push({
        id: Date.now() + i,
        x: 50 + Math.cos(angle) * radius,
        y: 50 + Math.sin(angle) * radius,
        delay: Math.random() * 1.5,
      });
    }
    setBlips(newBlips);
  }, []);

  useEffect(() => {
    generateBlips();
    const interval = setInterval(generateBlips, 2500);
    return () => clearInterval(interval);
  }, [generateBlips]);

  useEffect(() => {
    let startTime: number;
    const animate = (timestamp: number) => {
      if (!startTime) startTime = timestamp;
      const elapsed = timestamp - startTime;
      setSweepAngle((elapsed / 4000) * 360 % 360);
      animationRef.current = requestAnimationFrame(animate);
    };
    animationRef.current = requestAnimationFrame(animate);
    return () => {
      if (animationRef.current) {
        cancelAnimationFrame(animationRef.current);
      }
    };
  }, []);

  const features = [
    "400+ Gbps capacitate, always-on",
    "Filtrare inteligentă & rate-limiting L7",
    "Alertare instant & rapoarte",
  ];

  return (
    <section className="py-20 md:py-32 relative overflow-hidden">
      <div className="container mx-auto px-4 md:px-6">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5 }}
          viewport={{ once: true }}
          className="relative rounded-3xl overflow-hidden bg-[#0a1520]/80 backdrop-blur-xl border border-primary/10 p-8 md:p-12"
        >
          <div className="grid md:grid-cols-2 gap-10 items-center">
            {/* Radar */}
            <div className="relative aspect-square max-w-xs mx-auto">
              <svg viewBox="0 0 100 100" className="w-full h-full">
                {/* Background circles */}
                <circle cx="50" cy="50" r="45" fill="none" stroke="hsl(195, 100%, 55%)" strokeOpacity="0.1" strokeWidth="0.3" />
                <circle cx="50" cy="50" r="35" fill="none" stroke="hsl(195, 100%, 55%)" strokeOpacity="0.08" strokeWidth="0.3" />
                <circle cx="50" cy="50" r="25" fill="none" stroke="hsl(195, 100%, 55%)" strokeOpacity="0.06" strokeWidth="0.3" />
                <circle cx="50" cy="50" r="15" fill="none" stroke="hsl(195, 100%, 55%)" strokeOpacity="0.05" strokeWidth="0.3" />

                {/* Grid lines */}
                <line x1="50" y1="5" x2="50" y2="95" stroke="hsl(195, 100%, 55%)" strokeOpacity="0.05" strokeWidth="0.3" />
                <line x1="5" y1="50" x2="95" y2="50" stroke="hsl(195, 100%, 55%)" strokeOpacity="0.05" strokeWidth="0.3" />
                <line x1="15" y1="15" x2="85" y2="85" stroke="hsl(195, 100%, 55%)" strokeOpacity="0.03" strokeWidth="0.3" />
                <line x1="85" y1="15" x2="15" y2="85" stroke="hsl(195, 100%, 55%)" strokeOpacity="0.03" strokeWidth="0.3" />

                {/* Sweep cone */}
                <defs>
                  <linearGradient id="sweepGradient" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0.4" />
                    <stop offset="100%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0" />
                  </linearGradient>
                </defs>
                <g transform={`rotate(${sweepAngle}, 50, 50)`}>
                  <path
                    d="M50,50 L50,5 A45,45 0 0,1 89,30 Z"
                    fill="url(#sweepGradient)"
                  />
                  <line x1="50" y1="50" x2="50" y2="5" stroke="hsl(195, 100%, 55%)" strokeWidth="0.5" strokeOpacity="0.8" />
                </g>

                {/* Center dot */}
                <circle cx="50" cy="50" r="2" fill="hsl(195, 100%, 55%)" />
                <circle cx="50" cy="50" r="3.5" fill="none" stroke="hsl(195, 100%, 55%)" strokeWidth="0.5" strokeOpacity="0.5" />
              </svg>

              {/* Blips */}
              {blips.map((blip) => (
                <motion.div
                  key={blip.id}
                  className="absolute w-2 h-2 rounded-full bg-primary"
                  style={{
                    left: `${blip.x}%`,
                    top: `${blip.y}%`,
                    transform: "translate(-50%, -50%)",
                    boxShadow: "0 0 8px hsl(195, 100%, 55%)"
                  }}
                  initial={{ opacity: 0, scale: 0 }}
                  animate={{ opacity: [0, 1, 1, 0], scale: [0, 1, 1, 0] }}
                  transition={{
                    duration: 2,
                    delay: blip.delay,
                    times: [0, 0.1, 0.7, 1],
                  }}
                />
              ))}
            </div>

            {/* Content */}
            <div>
              <h2 className="text-3xl md:text-4xl font-bold text-foreground mb-4">
                Anti-<span className="text-primary">DDoS</span>
              </h2>
              <p className="text-muted-foreground mb-6 leading-relaxed">
                Protecție multi-layer L3/L4/L7 cu scrubbing automat și monitorizare în timp real. 
                Mitigăm volumetric, protocol și application-layer fără downtime.
              </p>

              <ul className="space-y-3">
                {features.map((feature, index) => (
                  <motion.li
                    key={index}
                    initial={{ opacity: 0, x: -20 }}
                    whileInView={{ opacity: 1, x: 0 }}
                    transition={{ duration: 0.3, delay: index * 0.1 }}
                    viewport={{ once: true }}
                    className="flex items-center gap-3"
                  >
                    <div className="p-1 rounded-full bg-primary/20">
                      <Check className="w-4 h-4 text-primary" />
                    </div>
                    <span className="text-foreground">{feature}</span>
                  </motion.li>
                ))}
              </ul>
            </div>
          </div>
        </motion.div>
      </div>
    </section>
  );
}

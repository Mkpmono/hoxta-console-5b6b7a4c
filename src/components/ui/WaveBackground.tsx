import { motion } from "framer-motion";

export function WaveBackground() {
  return (
    <div className="fixed inset-0 pointer-events-none overflow-hidden z-0">
      {/* Animated Wave Lines */}
      <svg
        className="absolute inset-0 w-full h-full"
        viewBox="0 0 1440 900"
        preserveAspectRatio="xMidYMid slice"
      >
        <defs>
          <linearGradient id="waveGrad1" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0" />
            <stop offset="30%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0.15" />
            <stop offset="50%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0.2" />
            <stop offset="70%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0.15" />
            <stop offset="100%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0" />
          </linearGradient>
          <linearGradient id="waveGrad2" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0" />
            <stop offset="40%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0.08" />
            <stop offset="60%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0.08" />
            <stop offset="100%" stopColor="hsl(195, 100%, 55%)" stopOpacity="0" />
          </linearGradient>
        </defs>

        {/* Main curved lines - like in screenshot */}
        <motion.path
          d="M-100,150 Q200,80 400,150 T800,150 T1200,150 T1600,150"
          fill="none"
          stroke="url(#waveGrad1)"
          strokeWidth="1"
          initial={{ pathLength: 0, opacity: 0 }}
          animate={{ pathLength: 1, opacity: 1 }}
          transition={{ duration: 2, ease: "easeInOut" }}
        />
        <motion.path
          d="M-100,200 Q250,130 500,200 T1000,200 T1500,200"
          fill="none"
          stroke="url(#waveGrad2)"
          strokeWidth="0.5"
          initial={{ pathLength: 0, opacity: 0 }}
          animate={{ pathLength: 1, opacity: 1 }}
          transition={{ duration: 2.5, ease: "easeInOut", delay: 0.2 }}
        />
        <motion.path
          d="M-100,280 Q300,220 600,280 T1200,280 T1600,280"
          fill="none"
          stroke="url(#waveGrad2)"
          strokeWidth="0.5"
          initial={{ pathLength: 0, opacity: 0 }}
          animate={{ pathLength: 1, opacity: 1 }}
          transition={{ duration: 2.5, ease: "easeInOut", delay: 0.4 }}
        />

        {/* Mid section waves */}
        <motion.path
          d="M-100,450 Q350,400 700,450 T1400,450"
          fill="none"
          stroke="url(#waveGrad2)"
          strokeWidth="0.5"
          initial={{ pathLength: 0, opacity: 0 }}
          animate={{ pathLength: 1, opacity: 1 }}
          transition={{ duration: 2, ease: "easeInOut", delay: 0.6 }}
        />

        {/* Bottom waves */}
        <motion.path
          d="M-100,700 Q400,650 800,700 T1600,700"
          fill="none"
          stroke="url(#waveGrad2)"
          strokeWidth="0.5"
          initial={{ pathLength: 0, opacity: 0 }}
          animate={{ pathLength: 1, opacity: 1 }}
          transition={{ duration: 2, ease: "easeInOut", delay: 0.8 }}
        />
      </svg>

      {/* Subtle glow spots */}
      <div className="absolute top-32 left-1/3 w-[500px] h-[500px] bg-primary/[0.03] rounded-full blur-[100px]" />
      <div className="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-primary/[0.02] rounded-full blur-[80px]" />
    </div>
  );
}

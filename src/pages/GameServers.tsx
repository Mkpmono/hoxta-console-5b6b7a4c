import { Layout } from "@/components/layout/Layout";
import { motion } from "framer-motion";
import { Gamepad2, Shield, Zap, Globe, Headphones, Server, Users, Cpu } from "lucide-react";
import { Link, useSearchParams } from "react-router-dom";
import {
  TrustBar,
  FeatureGrid,
  ContentSection,
  GlobalInfrastructure,
  FAQAccordion,
  FinalCTA,
  CrossSellBlock,
} from "@/components/hosting";
import { SEOHead, ServiceSchema, FAQSchema, OrganizationSchema } from "@/components/seo";

const games = [
  { id: "minecraft", name: "Minecraft", price: 3.29, image: "🎮", description: "Java & Bedrock server hosting", slots: "Up to 500 slots" },
  { id: "rust", name: "Rust", price: 20.00, image: "🎯", description: "Survival game servers", slots: "Up to 500 slots" },
  { id: "fivem", name: "FiveM", price: 19.00, image: "🚗", description: "GTA V roleplay servers", slots: "Unlimited slots" },
  { id: "redm", name: "RedM", price: 15.00, image: "🤠", description: "Red Dead Redemption 2 servers", slots: "Up to 200 slots" },
  { id: "cs2", name: "Counter-Strike 2", price: 8.00, image: "🔫", description: "Competitive CS2 servers", slots: "Up to 64 slots" },
  { id: "valheim", name: "Valheim", price: 10.00, image: "⚔️", description: "Viking survival servers", slots: "Up to 64 slots" },
  { id: "ark", name: "ARK: Survival", price: 15.00, image: "🦖", description: "Dinosaur survival servers", slots: "Up to 100 slots" },
  { id: "terraria", name: "Terraria", price: 5.00, image: "🌍", description: "2D sandbox adventure", slots: "Up to 255 slots" },
];

const gameFeatures = [
  {
    icon: Zap,
    title: "Instant Setup",
    description: "Your game server is deployed instantly. Start playing within minutes of ordering.",
  },
  {
    icon: Shield,
    title: "DDoS Protection",
    description: "Enterprise-grade DDoS mitigation protects your server from attacks 24/7.",
  },
  {
    icon: Globe,
    title: "Global Locations",
    description: "Deploy in multiple regions for the lowest ping to your players.",
  },
  {
    icon: Headphones,
    title: "24/7 Support",
    description: "Expert gaming support available around the clock via live chat and tickets.",
  },
  {
    icon: Cpu,
    title: "High Performance",
    description: "Latest-gen hardware with NVMe SSDs for lag-free gaming experience.",
  },
  {
    icon: Users,
    title: "Easy Management",
    description: "User-friendly control panel for server management, mods, and backups.",
  },
];

const gameFAQs = [
  {
    question: "How quickly is my game server deployed?",
    answer: "Game servers are deployed instantly after payment confirmation. You'll receive login details within minutes and can start configuring your server right away.",
  },
  {
    question: "Can I install mods and plugins?",
    answer: "Yes! Our control panel supports one-click mod installation for most games. You can also upload custom mods via SFTP or the file manager.",
  },
  {
    question: "What locations are available?",
    answer: "We offer game servers in North America, Europe, Asia, and Australia. Choose the location closest to your player base for the best performance.",
  },
  {
    question: "Can I upgrade my server later?",
    answer: "Absolutely! You can upgrade RAM, slots, or CPU at any time through your control panel. Upgrades are applied instantly without data loss.",
  },
  {
    question: "Do you offer refunds?",
    answer: "Yes, we offer a 24-hour money-back guarantee on all game servers. If you're not satisfied, contact support for a full refund.",
  },
  {
    question: "Is DDoS protection included?",
    answer: "Yes! All game servers include enterprise-grade DDoS protection at no extra cost. Your server stays online even during attacks.",
  },
];

export default function GameServers() {
  const [searchParams] = useSearchParams();
  const selectedGame = searchParams.get("game");

  return (
    <Layout>
      {/* SEO */}
      <SEOHead
        title="Game Server Hosting - Instant Setup, DDoS Protected | Hoxta"
        description="High-performance game server hosting for Minecraft, Rust, FiveM, CS2, and more. Instant setup, DDoS protection, 24/7 support. From $3.29/mo."
        canonicalUrl="https://hoxta.com/game-servers"
      />
      <ServiceSchema
        name="Hoxta Game Server Hosting"
        description="High-performance game server hosting with instant setup, DDoS protection, and 24/7 expert gaming support."
        priceRange="$3.29 - $20.00"
      />
      <FAQSchema faqs={gameFAQs} />
      <OrganizationSchema />

      {/* Hero Section */}
      <section className="py-20 md:py-32 relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-primary/5 via-transparent to-transparent" />
        <div className="container mx-auto px-4 md:px-6 relative">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5 }}
            className="text-center mb-16"
          >
            <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary mb-6">
              <Gamepad2 className="w-4 h-4" />
              <span className="text-sm font-medium">Game Servers</span>
            </div>
            <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6">
              {selectedGame ? games.find(g => g.id === selectedGame)?.name : "Game Server"}{" "}
              <span className="text-gradient">Hosting</span>
            </h1>
            <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
              High-performance game servers with instant setup, DDoS protection, and 24/7 support. 
              Play your way with full mod support and global locations.
            </p>
          </motion.div>

          <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {games.map((game, index) => (
              <motion.div
                key={game.id}
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.5, delay: index * 0.05 }}
                className={`glass-card-hover p-6 ${selectedGame === game.id ? "border-primary/50 shadow-glow" : ""}`}
              >
                <motion.div
                  className="text-4xl mb-4"
                  animate={{ scale: [1, 1.05, 1] }}
                  transition={{ duration: 2, repeat: Infinity }}
                >
                  {game.image}
                </motion.div>
                <h3 className="text-lg font-semibold text-foreground mb-1">{game.name}</h3>
                <p className="text-sm text-muted-foreground mb-2">{game.description}</p>
                <p className="text-xs text-primary mb-4">{game.slots}</p>
                <div className="flex items-baseline gap-1 mb-4">
                  <span className="text-xs text-muted-foreground">From</span>
                  <span className="text-2xl font-bold text-primary">${game.price.toFixed(2)}</span>
                  <span className="text-xs text-muted-foreground">/month</span>
                </div>
                <Link
                  to={`/contact?game=${game.id}`}
                  className="block w-full py-2 text-center text-sm font-medium rounded-lg bg-muted hover:bg-primary/20 text-foreground transition-colors"
                >
                  Configure Server
                </Link>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Trust Bar */}
      <TrustBar />

      {/* Feature Grid */}
      <FeatureGrid
        title="Why Choose Hoxta Game Servers"
        subtitle="Built for gamers, by gamers. Premium features included with every server."
        features={gameFeatures}
      />

      {/* Content Sections */}
      <ContentSection
        title="Instant Server Deployment"
        description="Get your game server online in minutes, not hours. Our automated deployment system provisions your server instantly with your chosen configuration, mods, and settings."
        points={[
          "Server online within 60 seconds",
          "Pre-installed popular mod packs",
          "Easy configuration via web panel",
          "Automatic updates available",
        ]}
        icon={Zap}
      />

      <ContentSection
        title="Enterprise DDoS Protection"
        description="Gaming servers are frequent targets for DDoS attacks. Our enterprise-grade protection keeps your server online and your players happy, even during the largest attacks."
        points={[
          "Up to 1Tbps DDoS mitigation",
          "Always-on protection",
          "No extra cost, included free",
          "Zero performance impact",
        ]}
        icon={Shield}
        reverse
      />

      {/* Global Infrastructure */}
      <GlobalInfrastructure />

      {/* Cross-sell: Higher tier / VPS */}
      <CrossSellBlock
        headline="Need More Slots?"
        description="Running a large community or need more resources? Explore our higher-tier game plans or consider a VPS for unlimited customization and dedicated resources."
        benefits={["Up to 500+ player slots", "Dedicated CPU & RAM", "Custom configurations"]}
        ctaText="View VPS Hosting"
        ctaHref="/vps-hosting"
        icon={Server}
      />

      {/* Second cross-sell for heavy usage */}
      <CrossSellBlock
        headline="Custom Mods & Heavy Usage?"
        description="For servers running complex mods, custom scripts, or expecting high player counts, a VPS gives you complete control and guaranteed resources."
        benefits={["Full root access", "Install any software", "No resource limits"]}
        ctaText="Explore VPS Options"
        ctaHref="/vps-hosting"
        icon={Cpu}
        variant="subtle"
      />

      {/* FAQ */}
      <FAQAccordion
        title="Game Server FAQ"
        subtitle="Common questions about our game server hosting."
        items={gameFAQs}
      />

      {/* Final CTA */}
      <FinalCTA
        title="Ready to Start Gaming?"
        subtitle="Deploy your game server in under 60 seconds with instant setup and 24/7 support."
      />
    </Layout>
  );
}

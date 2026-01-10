import { useState, useMemo } from "react";
import { Layout } from "@/components/layout/Layout";
import { SEOHead } from "@/components/seo";
import { motion } from "framer-motion";
import { Link } from "react-router-dom";
import { 
  Search, 
  BookOpen, 
  Server, 
  Shield, 
  Settings, 
  Users, 
  Zap,
  HelpCircle,
  ChevronRight,
  Clock,
  Eye,
  ArrowRight,
  Gamepad2,
  Globe,
  Database,
  Terminal
} from "lucide-react";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";

// Knowledge base categories
const categories = [
  {
    id: "getting-started",
    title: "Getting Started",
    description: "Quick start guides and first steps",
    icon: Zap,
    color: "from-green-500/20 to-green-500/5",
    articles: 12,
  },
  {
    id: "game-servers",
    title: "Game Servers",
    description: "Setup and configuration guides",
    icon: Gamepad2,
    color: "from-blue-500/20 to-blue-500/5",
    articles: 28,
  },
  {
    id: "vps-hosting",
    title: "VPS & Dedicated",
    description: "Server management tutorials",
    icon: Server,
    color: "from-purple-500/20 to-purple-500/5",
    articles: 18,
  },
  {
    id: "security",
    title: "Security & DDoS",
    description: "Protection and hardening guides",
    icon: Shield,
    color: "from-red-500/20 to-red-500/5",
    articles: 15,
  },
  {
    id: "billing",
    title: "Billing & Account",
    description: "Payments, invoices, and account",
    icon: Users,
    color: "from-yellow-500/20 to-yellow-500/5",
    articles: 10,
  },
  {
    id: "troubleshooting",
    title: "Troubleshooting",
    description: "Common issues and solutions",
    icon: HelpCircle,
    color: "from-orange-500/20 to-orange-500/5",
    articles: 22,
  },
];

// Featured/Popular articles
const featuredArticles = [
  {
    id: "minecraft-server-setup",
    title: "How to Set Up Your Minecraft Server",
    category: "Game Servers",
    categoryId: "game-servers",
    readTime: "5 min",
    views: 12500,
    excerpt: "Complete guide to deploying and configuring your Minecraft server with plugins and optimization.",
  },
  {
    id: "ddos-protection-explained",
    title: "Understanding DDoS Protection",
    category: "Security",
    categoryId: "security",
    readTime: "8 min",
    views: 8900,
    excerpt: "Learn how our multi-layer DDoS mitigation works and how to configure protection rules.",
  },
  {
    id: "fivem-server-optimization",
    title: "FiveM Server Optimization Guide",
    category: "Game Servers",
    categoryId: "game-servers",
    readTime: "12 min",
    views: 7200,
    excerpt: "Maximize your FiveM server performance with these advanced configuration tips.",
  },
  {
    id: "vps-initial-setup",
    title: "VPS Initial Setup & Security",
    category: "VPS & Dedicated",
    categoryId: "vps-hosting",
    readTime: "10 min",
    views: 6800,
    excerpt: "Essential first steps after deploying your VPS: SSH keys, firewall, and hardening.",
  },
];

// Recent articles
const recentArticles = [
  {
    id: "rust-server-wipes",
    title: "Managing Rust Server Wipes",
    category: "Game Servers",
    date: "2024-01-08",
  },
  {
    id: "backup-strategies",
    title: "Automated Backup Strategies",
    category: "VPS & Dedicated",
    date: "2024-01-06",
  },
  {
    id: "port-forwarding",
    title: "Port Forwarding Configuration",
    category: "Troubleshooting",
    date: "2024-01-05",
  },
  {
    id: "ssl-certificates",
    title: "Installing SSL Certificates",
    category: "Security",
    date: "2024-01-04",
  },
  {
    id: "payment-methods",
    title: "Accepted Payment Methods",
    category: "Billing & Account",
    date: "2024-01-03",
  },
];

// Quick links
const quickLinks = [
  { icon: Terminal, label: "API Documentation", href: "/docs/api" },
  { icon: Database, label: "Database Guides", href: "/knowledge-base/databases" },
  { icon: Globe, label: "Domain Setup", href: "/knowledge-base/domains" },
  { icon: Settings, label: "Control Panel", href: "/knowledge-base/panel" },
];

function CategoryCard({ category, index }: { category: typeof categories[0]; index: number }) {
  return (
    <motion.div
      initial={{ opacity: 0, y: 30 }}
      whileInView={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.4, delay: index * 0.1 }}
      viewport={{ once: true }}
    >
      <Link to={`/knowledge-base/${category.id}`}>
        <div className="group glass-card p-6 h-full hover:border-primary/30 transition-all duration-300 hover:shadow-[0_8px_40px_rgba(25,195,255,0.12)] hover:-translate-y-1">
          <div className={`w-14 h-14 rounded-xl bg-gradient-to-br ${category.color} border border-border/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform`}>
            <category.icon className="w-7 h-7 text-primary" />
          </div>
          <h3 className="text-lg font-semibold text-foreground mb-2 group-hover:text-primary transition-colors">
            {category.title}
          </h3>
          <p className="text-sm text-muted-foreground mb-4">{category.description}</p>
          <div className="flex items-center justify-between text-sm">
            <span className="text-muted-foreground">{category.articles} articles</span>
            <ChevronRight className="w-4 h-4 text-primary opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all" />
          </div>
        </div>
      </Link>
    </motion.div>
  );
}

function ArticleCard({ article, index }: { article: typeof featuredArticles[0]; index: number }) {
  return (
    <motion.div
      initial={{ opacity: 0, y: 30 }}
      whileInView={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.4, delay: index * 0.1 }}
      viewport={{ once: true }}
    >
      <Link to={`/knowledge-base/${article.categoryId}/${article.id}`}>
        <div className="group glass-card p-6 h-full hover:border-primary/30 transition-all duration-300 hover:shadow-[0_8px_40px_rgba(25,195,255,0.12)]">
          <div className="flex items-center gap-2 mb-3">
            <span className="px-2 py-1 text-xs bg-primary/10 text-primary rounded">{article.category}</span>
            <div className="flex items-center gap-3 text-xs text-muted-foreground ml-auto">
              <span className="flex items-center gap-1">
                <Clock className="w-3 h-3" />
                {article.readTime}
              </span>
              <span className="flex items-center gap-1">
                <Eye className="w-3 h-3" />
                {article.views.toLocaleString()}
              </span>
            </div>
          </div>
          <h3 className="text-base font-semibold text-foreground mb-2 group-hover:text-primary transition-colors line-clamp-2">
            {article.title}
          </h3>
          <p className="text-sm text-muted-foreground line-clamp-2">{article.excerpt}</p>
        </div>
      </Link>
    </motion.div>
  );
}

const KnowledgeBase = () => {
  const [searchQuery, setSearchQuery] = useState("");
  
  const filteredCategories = useMemo(() => {
    if (!searchQuery) return categories;
    return categories.filter(cat => 
      cat.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
      cat.description.toLowerCase().includes(searchQuery.toLowerCase())
    );
  }, [searchQuery]);

  return (
    <Layout>
      <SEOHead 
        title="Knowledge Base | Hoxta Hosting"
        description="Find tutorials, guides, and troubleshooting articles for game servers, VPS, web hosting, and more."
      />
      
      {/* Hero Section */}
      <section className="pt-32 pb-16 relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-primary/5 to-transparent pointer-events-none" />
        
        <div className="container mx-auto px-4 md:px-6 relative z-10">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5 }}
            className="text-center max-w-3xl mx-auto"
          >
            <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 border border-primary/20 mb-6">
              <BookOpen className="w-4 h-4 text-primary" />
              <span className="text-sm font-medium text-primary">Knowledge Base</span>
            </div>
            
            <h1 className="text-4xl md:text-5xl font-bold text-foreground mb-6">
              How Can We <span className="text-primary">Help You?</span>
            </h1>
            <p className="text-lg text-muted-foreground mb-8">
              Browse tutorials, guides, and troubleshooting articles to get the most out of your hosting services.
            </p>
            
            {/* Search Bar */}
            <div className="relative max-w-xl mx-auto">
              <Search className="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
              <Input
                type="text"
                placeholder="Search for articles, tutorials, or topics..."
                value={searchQuery}
                onChange={(e) => setSearchQuery(e.target.value)}
                className="pl-12 pr-4 py-6 text-base bg-card/60 border-border/50 focus:border-primary/50"
              />
            </div>
          </motion.div>
        </div>
      </section>

      {/* Quick Links */}
      <section className="py-8">
        <div className="container mx-auto px-4 md:px-6">
          <div className="flex flex-wrap justify-center gap-4">
            {quickLinks.map((link, index) => (
              <motion.div
                key={index}
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.3, delay: index * 0.1 }}
              >
                <Link to={link.href}>
                  <Button variant="outline" className="btn-outline gap-2">
                    <link.icon className="w-4 h-4" />
                    {link.label}
                  </Button>
                </Link>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Categories */}
      <section className="py-16">
        <div className="container mx-auto px-4 md:px-6">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5 }}
            viewport={{ once: true }}
            className="text-center mb-12"
          >
            <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-4">Browse by Category</h2>
            <p className="text-muted-foreground">Find articles organized by topic</p>
          </motion.div>
          
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {filteredCategories.map((category, index) => (
              <CategoryCard key={category.id} category={category} index={index} />
            ))}
          </div>
        </div>
      </section>

      {/* Featured Articles */}
      <section className="py-16 bg-card/30">
        <div className="container mx-auto px-4 md:px-6">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5 }}
            viewport={{ once: true }}
            className="flex items-center justify-between mb-12"
          >
            <div>
              <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-2">Popular Articles</h2>
              <p className="text-muted-foreground">Most viewed guides and tutorials</p>
            </div>
            <Link to="/knowledge-base/popular">
              <Button variant="ghost" className="text-primary hover:text-primary/80 gap-1">
                View All <ArrowRight className="w-4 h-4" />
              </Button>
            </Link>
          </motion.div>
          
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {featuredArticles.map((article, index) => (
              <ArticleCard key={article.id} article={article} index={index} />
            ))}
          </div>
        </div>
      </section>

      {/* Recent Articles */}
      <section className="py-16">
        <div className="container mx-auto px-4 md:px-6">
          <div className="grid lg:grid-cols-3 gap-12">
            {/* Recent Articles List */}
            <div className="lg:col-span-2">
              <motion.div
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.5 }}
                viewport={{ once: true }}
              >
                <h2 className="text-2xl font-bold text-foreground mb-6">Recently Updated</h2>
                <div className="space-y-4">
                  {recentArticles.map((article, index) => (
                    <motion.div
                      key={article.id}
                      initial={{ opacity: 0, x: -20 }}
                      whileInView={{ opacity: 1, x: 0 }}
                      transition={{ duration: 0.4, delay: index * 0.1 }}
                      viewport={{ once: true }}
                    >
                      <Link to={`/knowledge-base/${article.id}`}>
                        <div className="group flex items-center justify-between p-4 rounded-xl bg-card/40 border border-border/30 hover:border-primary/30 transition-all">
                          <div className="flex items-center gap-4">
                            <BookOpen className="w-5 h-5 text-muted-foreground group-hover:text-primary transition-colors" />
                            <div>
                              <h4 className="font-medium text-foreground group-hover:text-primary transition-colors">
                                {article.title}
                              </h4>
                              <span className="text-sm text-muted-foreground">{article.category}</span>
                            </div>
                          </div>
                          <span className="text-sm text-muted-foreground">{article.date}</span>
                        </div>
                      </Link>
                    </motion.div>
                  ))}
                </div>
              </motion.div>
            </div>

            {/* Sidebar */}
            <div>
              <motion.div
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.5 }}
                viewport={{ once: true }}
                className="glass-card p-6"
              >
                <h3 className="text-lg font-semibold text-foreground mb-4">Need More Help?</h3>
                <p className="text-sm text-muted-foreground mb-6">
                  Can't find what you're looking for? Our support team is available 24/7.
                </p>
                <div className="space-y-3">
                  <Link to="/panel/tickets/new">
                    <Button className="w-full btn-glow">Open Support Ticket</Button>
                  </Link>
                  <Link to="/contact">
                    <Button variant="outline" className="w-full btn-outline">Contact Us</Button>
                  </Link>
                </div>
              </motion.div>
            </div>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default KnowledgeBase;

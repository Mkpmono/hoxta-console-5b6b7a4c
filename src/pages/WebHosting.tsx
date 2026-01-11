import { Layout } from "@/components/layout/Layout";
import {
  HostingHero,
  TrustBar,
  PricingPlans,
  FeatureGrid,
  ContentSection,
  HowItWorks,
  GlobalInfrastructure,
  PlanComparison,
  FAQAccordion,
  FinalCTA,
  CrossSellBlock,
} from "@/components/hosting";
import {
  webHostingPlans,
  webHostingFeatures,
  webHostingFAQs,
  webHostingComparison,
} from "@/data/hostingData";
import { Globe, Zap, Shield, Server } from "lucide-react";
import { SEOHead, ServiceSchema, FAQSchema, OrganizationSchema } from "@/components/seo";

export default function WebHosting() {
  return (
    <Layout>
      {/* SEO */}
      <SEOHead
        title="Web Hosting - Fast, Secure & Reliable | Hoxta"
        description="Launch your website with Hoxta's blazing-fast NVMe web hosting. Free SSL, daily backups, 24/7 support, and 99.9% uptime. Plans from $2.99/mo."
        canonicalUrl="https://hoxta.com/web-hosting"
      />
      <ServiceSchema
        name="Hoxta Web Hosting"
        description="Premium web hosting with NVMe SSD storage, free SSL certificates, daily backups, and enterprise-grade DDoS protection."
        priceRange="$2.99 - $24.99"
      />
      <FAQSchema faqs={webHostingFAQs} />
      <OrganizationSchema />

      {/* Hero Section */}
      <HostingHero
        badge="Web Hosting"
        headline="Lightning-Fast"
        highlightedText="Web Hosting"
        description="Launch your website with blazing-fast NVMe storage, free SSL certificates, and enterprise-grade security. From personal blogs to business sites, we've got you covered."
        promotion={{
          text: "New Year Sale",
          discount: "Up to 70% OFF",
          endDate: new Date(Date.now() + 7 * 24 * 60 * 60 * 1000),
        }}
        primaryCTA={{ text: "Get Started", href: "#pricing" }}
        secondaryCTA={{ text: "Compare Plans", href: "#comparison" }}
      />

      {/* Trust Bar */}
      <TrustBar />

      {/* Pricing Plans */}
      <PricingPlans
        title="Web Hosting Plans"
        subtitle="Powerful hosting solutions for every website. All plans include free SSL, daily backups, and 24/7 support."
        plans={webHostingPlans}
        productSlug="web-hosting"
      />

      {/* Why Choose Section */}
      <FeatureGrid
        title="Why Choose Hoxta Web Hosting"
        subtitle="Enterprise-grade infrastructure with premium features included in every plan."
        features={webHostingFeatures}
      />

      {/* Content Section - What is Web Hosting */}
      <ContentSection
        title="What is Web Hosting?"
        description="Web hosting is the foundation of your online presence. It's the service that stores your website files on secure servers and makes them accessible to visitors around the world, 24 hours a day, 7 days a week."
        points={[
          "Store your website files, images, and databases securely",
          "Ensure your site is always online and accessible globally",
          "Get professional email addresses with your domain",
          "Scale resources as your website grows",
        ]}
        icon={Globe}
      />

      {/* Content Section - Performance */}
      <ContentSection
        title="Unmatched Performance"
        description="Our hosting infrastructure is built for speed. With NVMe SSD storage, LiteSpeed web servers, and optimized caching, your website loads in milliseconds, improving user experience and search rankings."
        points={[
          "NVMe SSDs deliver 10x faster speeds than traditional storage",
          "LiteSpeed web server with built-in caching technology",
          "Global CDN integration for worldwide fast delivery",
          "HTTP/3 and QUIC protocol support for modern performance",
        ]}
        icon={Zap}
        reverse
      />

      {/* Content Section - Security */}
      <ContentSection
        title="Enterprise Security"
        description="Security isn't optional – it's essential. Every hosting account is protected by multiple layers of security, from DDoS protection to malware scanning, ensuring your website and visitors stay safe."
        points={[
          "Free SSL certificates for all domains",
          "Enterprise-grade DDoS mitigation",
          "Real-time malware scanning and removal",
          "Automated daily backups with easy restore",
        ]}
        icon={Shield}
      />

      {/* How It Works */}
      <HowItWorks />

      {/* Global Infrastructure */}
      <GlobalInfrastructure />

      {/* Plan Comparison */}
      <PlanComparison
        title="Compare Web Hosting Plans"
        subtitle="See exactly what's included in each plan to find your perfect match."
        plans={webHostingComparison.plans}
        categories={webHostingComparison.categories}
      />

      {/* Cross-sell: VPS */}
      <CrossSellBlock
        headline="Need More Power?"
        description="Outgrowing shared hosting? Upgrade to VPS for dedicated resources, full root access, and unlimited scalability for demanding applications."
        benefits={["Dedicated CPU & RAM", "Full root access", "Instant scalability"]}
        ctaText="View VPS Plans"
        ctaHref="/vps-hosting"
        icon={Server}
      />

      {/* FAQ Section */}
      <FAQAccordion
        title="Web Hosting FAQ"
        subtitle="Got questions about web hosting? We've got answers."
        items={webHostingFAQs}
      />

      {/* Final CTA */}
      <FinalCTA
        title="Ready to Launch Your Website?"
        subtitle="Join thousands of website owners who trust Hoxta for reliable, fast, and secure web hosting."
      />
    </Layout>
  );
}

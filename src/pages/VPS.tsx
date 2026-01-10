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
  vpsHostingPlans,
  vpsHostingFeatures,
  vpsHostingFAQs,
  vpsHostingComparison,
} from "@/data/hostingData";
import { Cpu, Lock, Gauge, Server } from "lucide-react";
import { SEOHead, ServiceSchema, FAQSchema, OrganizationSchema } from "@/components/seo";

export default function VPS() {
  return (
    <Layout>
      {/* SEO */}
      <SEOHead
        title="VPS Hosting - High-Performance Virtual Servers | Hoxta"
        description="Deploy powerful VPS with NVMe storage, full root access, and DDoS protection. Scalable virtual servers from $9.99/mo with 24/7 expert support."
        canonicalUrl="https://hoxta.com/vps-hosting"
      />
      <ServiceSchema
        name="Hoxta VPS Hosting"
        description="High-performance VPS hosting with dedicated resources, NVMe SSD storage, full root access, and enterprise DDoS protection."
        priceRange="$9.99 - $74.99"
      />
      <FAQSchema faqs={vpsHostingFAQs} />
      <OrganizationSchema />

      {/* Hero Section */}
      <HostingHero
        badge="VPS Hosting"
        headline="High-Performance"
        highlightedText="VPS Hosting"
        description="Virtual private servers with dedicated resources, full root access, and enterprise-grade infrastructure. Scale instantly with guaranteed performance."
        promotion={{
          text: "Launch Promo",
          discount: "25% OFF First 3 Months",
          endDate: new Date(Date.now() + 10 * 24 * 60 * 60 * 1000),
        }}
        primaryCTA={{ text: "Deploy Now", href: "#pricing" }}
        secondaryCTA={{ text: "Compare Plans", href: "#comparison" }}
      />

      {/* Trust Bar */}
      <TrustBar />

      {/* Pricing Plans */}
      <PricingPlans
        title="VPS Hosting Plans"
        subtitle="Dedicated resources that are never shared or oversold. All plans include root access, DDoS protection, and 24/7 support."
        plans={vpsHostingPlans}
      />

      {/* Why Choose Section */}
      <FeatureGrid
        title="Why Choose Hoxta VPS"
        subtitle="Enterprise-grade virtual servers built for performance and reliability."
        features={vpsHostingFeatures}
      />

      {/* Content Section - What is VPS */}
      <ContentSection
        title="What is VPS Hosting?"
        description="A Virtual Private Server (VPS) gives you dedicated resources within a virtualized environment. Unlike shared hosting, your CPU, RAM, and storage are guaranteed and not affected by other users on the same physical server."
        points={[
          "Guaranteed CPU cores and RAM allocation",
          "Isolated environment from other users",
          "Full root access for complete control",
          "Ideal for growing websites and applications",
        ]}
        icon={Server}
      />

      {/* Content Section - Performance */}
      <ContentSection
        title="Blazing-Fast Performance"
        description="Our VPS infrastructure is built on enterprise-grade hardware with NVMe SSD storage, delivering exceptional I/O performance for demanding applications and databases."
        points={[
          "Latest-gen Intel Xeon and AMD EPYC processors",
          "Pure NVMe SSD storage for maximum speed",
          "High-bandwidth network with low latency",
          "Instant resource scaling when needed",
        ]}
        icon={Gauge}
        reverse
      />

      {/* Content Section - Control */}
      <ContentSection
        title="Full Root Access"
        description="Take complete control of your server environment. Install any software, configure custom settings, and optimize for your specific workload."
        points={[
          "SSH root access to your server",
          "Install any OS or control panel",
          "Custom software and configurations",
          "Full firewall and security control",
        ]}
        icon={Lock}
      />

      {/* Content Section - Scalability */}
      <ContentSection
        title="Scale On Demand"
        description="Start with what you need today and scale instantly as your requirements grow. Upgrade CPU, RAM, or storage without migration or downtime."
        points={[
          "Instant resource upgrades",
          "No migration required",
          "Predictable, transparent pricing",
          "Pay only for what you use",
        ]}
        icon={Cpu}
        reverse
      />

      {/* How It Works */}
      <HowItWorks />

      {/* Global Infrastructure */}
      <GlobalInfrastructure />

      {/* Plan Comparison */}
      <PlanComparison
        title="Compare VPS Plans"
        subtitle="Choose the right VPS configuration for your needs."
        plans={vpsHostingComparison.plans}
        categories={vpsHostingComparison.categories}
      />

      {/* Cross-sell: Dedicated */}
      <CrossSellBlock
        headline="For Mission-Critical Workloads"
        description="Need maximum performance and complete hardware control? Dedicated servers offer full hardware isolation with no virtualization overhead."
        benefits={["Full hardware control", "No shared resources", "Maximum performance"]}
        ctaText="View Dedicated Servers"
        ctaHref="/dedicated-servers"
        icon={Server}
      />

      {/* FAQ Section */}
      <FAQAccordion
        title="VPS Hosting FAQ"
        subtitle="Everything you need to know about our VPS hosting."
        items={vpsHostingFAQs}
      />

      {/* Final CTA */}
      <FinalCTA
        title="Ready to Deploy Your VPS?"
        subtitle="Get started in minutes with our high-performance virtual servers. 24/7 support included."
      />
    </Layout>
  );
}

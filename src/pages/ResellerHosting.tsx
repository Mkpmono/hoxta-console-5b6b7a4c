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
  resellerHostingPlans,
  resellerHostingFeatures,
  resellerHostingFAQs,
  resellerHostingComparison,
} from "@/data/hostingData";
import { Users, TrendingUp, DollarSign, Server } from "lucide-react";
import { SEOHead, ServiceSchema, FAQSchema, OrganizationSchema } from "@/components/seo";

export default function ResellerHosting() {
  return (
    <Layout>
      {/* SEO */}
      <SEOHead
        title="Reseller Hosting - Start Your Hosting Business | Hoxta"
        description="Launch your own hosting company with Hoxta's white-label reseller hosting. WHM/cPanel, free WHMCS, unlimited clients. Plans from $14.99/mo."
        canonicalUrl="https://hoxta.com/reseller-hosting"
      />
      <ServiceSchema
        name="Hoxta Reseller Hosting"
        description="White-label reseller hosting with WHM/cPanel, WHMCS integration, and unlimited client accounts to start your hosting business."
        priceRange="$14.99 - $74.99"
      />
      <FAQSchema faqs={resellerHostingFAQs} />
      <OrganizationSchema />

      {/* Hero Section */}
      <HostingHero
        badge="Reseller Hosting"
        headline="Start Your"
        highlightedText="Hosting Business"
        description="Create and manage your own hosting company with our white-label reseller plans. Set your prices, keep 100% of profits, and let us handle the infrastructure."
        promotion={{
          text: "Limited Offer",
          discount: "Free WHMCS License",
          endDate: new Date(Date.now() + 14 * 24 * 60 * 60 * 1000),
        }}
        primaryCTA={{ text: "Start Reselling", href: "#pricing" }}
        secondaryCTA={{ text: "Compare Plans", href: "#comparison" }}
      />

      {/* Trust Bar */}
      <TrustBar />

      {/* Pricing Plans */}
      <PricingPlans
        title="Reseller Hosting Plans"
        subtitle="Everything you need to run a professional hosting business. All plans include WHM, white-label branding, and 24/7 support."
        plans={resellerHostingPlans}
        productSlug="reseller-hosting"
      />

      {/* Why Choose Section */}
      <FeatureGrid
        title="Why Choose Hoxta Reseller Hosting"
        subtitle="The complete toolkit for building and scaling your hosting business."
        features={resellerHostingFeatures}
      />

      {/* Content Section - What is Reseller Hosting */}
      <ContentSection
        title="What is Reseller Hosting?"
        description="Reseller hosting lets you purchase hosting resources in bulk and resell them to your own clients under your brand. You manage clients through WHM while we handle all the infrastructure, security, and server management."
        points={[
          "Purchase server resources at wholesale prices",
          "Create and manage individual cPanel accounts for clients",
          "Set your own pricing and billing terms",
          "Full white-label branding with custom nameservers",
        ]}
        icon={Users}
      />

      {/* Content Section - Business Growth */}
      <ContentSection
        title="Scale Your Business"
        description="Start small and grow without limits. Our reseller plans scale seamlessly as you acquire more clients. Upgrade anytime without migration or downtime."
        points={[
          "Easy upgrades as your client base grows",
          "Integrated billing with optional WHMCS license",
          "Automated provisioning and account management",
          "White-label support options available",
        ]}
        icon={TrendingUp}
        reverse
      />

      {/* Content Section - Profitability */}
      <ContentSection
        title="Maximize Your Profits"
        description="With low overhead costs and competitive wholesale pricing, reseller hosting offers excellent profit margins. You set the prices and keep 100% of what you charge."
        points={[
          "No infrastructure investment required",
          "Complete pricing flexibility",
          "Recurring revenue business model",
          "Low startup costs, high profit potential",
        ]}
        icon={DollarSign}
      />

      {/* How It Works */}
      <HowItWorks />

      {/* Global Infrastructure */}
      <GlobalInfrastructure />

      {/* Plan Comparison */}
      <PlanComparison
        title="Compare Reseller Plans"
        subtitle="Find the perfect plan for your hosting business."
        plans={resellerHostingComparison.plans}
        categories={resellerHostingComparison.categories}
      />

      {/* Cross-sell: VPS/Dedicated */}
      <CrossSellBlock
        headline="Growing Fast?"
        description="Need more power and isolation for your hosting business? Upgrade to VPS or dedicated servers for enhanced performance, complete control, and custom configurations."
        benefits={["Full server isolation", "Unlimited resource allocation", "Custom server setups"]}
        ctaText="Explore VPS Hosting"
        ctaHref="/vps-hosting"
        icon={Server}
      />

      {/* FAQ Section */}
      <FAQAccordion
        title="Reseller Hosting FAQ"
        subtitle="Common questions about starting your hosting business."
        items={resellerHostingFAQs}
      />

      {/* Final CTA */}
      <FinalCTA
        title="Ready to Start Your Hosting Business?"
        subtitle="Join hundreds of successful resellers who trust Hoxta for reliable infrastructure and excellent support."
      />
    </Layout>
  );
}

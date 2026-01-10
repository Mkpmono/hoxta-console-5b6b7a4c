import { useEffect } from "react";

export function OrganizationSchema() {
  useEffect(() => {
    const schema = {
      "@context": "https://schema.org",
      "@type": "Organization",
      name: "Hoxta",
      url: "https://hoxta.com",
      logo: "https://hoxta.com/logo.png",
      description: "Premium web hosting, VPS, dedicated servers, and game server hosting with enterprise-grade infrastructure and 24/7 support.",
      contactPoint: {
        "@type": "ContactPoint",
        telephone: "+1-800-HOXTA",
        contactType: "customer service",
        availableLanguage: ["English"],
        areaServed: "Worldwide",
      },
      sameAs: [
        "https://twitter.com/hoxta",
        "https://facebook.com/hoxta",
        "https://linkedin.com/company/hoxta",
      ],
      address: {
        "@type": "PostalAddress",
        addressCountry: "US",
      },
    };

    const script = document.createElement("script");
    script.type = "application/ld+json";
    script.id = "organization-schema";
    script.text = JSON.stringify(schema);
    
    // Only add if not already present
    if (!document.getElementById("organization-schema")) {
      document.head.appendChild(script);
    }

    return () => {
      const el = document.getElementById("organization-schema");
      if (el) el.remove();
    };
  }, []);

  return null;
}

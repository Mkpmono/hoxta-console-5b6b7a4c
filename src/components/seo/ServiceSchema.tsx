import { useEffect } from "react";

interface ServiceSchemaProps {
  name: string;
  description: string;
  priceRange: string;
  billingCycle?: string;
}

export function ServiceSchema({ name, description, priceRange, billingCycle = "monthly" }: ServiceSchemaProps) {
  useEffect(() => {
    const schema = {
      "@context": "https://schema.org",
      "@type": "Product",
      name: name,
      description: description,
      brand: {
        "@type": "Brand",
        name: "Hoxta",
      },
      offers: {
        "@type": "AggregateOffer",
        priceCurrency: "USD",
        priceSpecification: {
          "@type": "PriceSpecification",
          price: priceRange,
          billingDuration: billingCycle === "monthly" ? "P1M" : "P1Y",
        },
        availability: "https://schema.org/InStock",
      },
      provider: {
        "@type": "Organization",
        name: "Hoxta",
        url: "https://hoxta.com",
      },
    };

    const script = document.createElement("script");
    script.type = "application/ld+json";
    script.id = "service-schema";
    script.text = JSON.stringify(schema);
    
    // Remove existing schema if present
    const existing = document.getElementById("service-schema");
    if (existing) {
      existing.remove();
    }
    
    document.head.appendChild(script);

    return () => {
      const el = document.getElementById("service-schema");
      if (el) el.remove();
    };
  }, [name, description, priceRange, billingCycle]);

  return null;
}

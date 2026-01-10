import { forwardRef } from "react";
import { motion } from "framer-motion";
import { Link } from "react-router-dom";
import { ArrowRight, LucideIcon } from "lucide-react";

interface CrossSellBlockProps {
  headline: string;
  description: string;
  benefits: string[];
  ctaText: string;
  ctaHref: string;
  icon: LucideIcon;
  variant?: "default" | "subtle";
}

// FIX: Added forwardRef to prevent React warning about refs on function components
export const CrossSellBlock = forwardRef<HTMLElement, CrossSellBlockProps>(function CrossSellBlock({
  headline,
  description,
  benefits,
  ctaText,
  ctaHref,
  icon: Icon,
  variant = "default",
}, ref) {
  return (
    <section className="py-16 md:py-24">
      <div className="container mx-auto px-4 md:px-6">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className={`relative overflow-hidden rounded-2xl p-8 md:p-12 ${
            variant === "default"
              ? "bg-gradient-to-br from-primary/10 via-background to-primary/5 border border-primary/20"
              : "glass-card"
          }`}
        >
          {/* Background decoration */}
          <div className="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2" />
          <div className="absolute bottom-0 left-0 w-48 h-48 bg-primary/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2" />

          <div className="relative z-10 flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
            {/* Icon */}
            <motion.div
              initial={{ scale: 0.8, opacity: 0 }}
              whileInView={{ scale: 1, opacity: 1 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: 0.2 }}
              className="flex-shrink-0"
            >
              <div className="w-20 h-20 rounded-2xl bg-primary/10 flex items-center justify-center">
                <Icon className="w-10 h-10 text-primary" />
              </div>
            </motion.div>

            {/* Content */}
            <div className="flex-1 text-center lg:text-left">
              <h3 className="text-2xl md:text-3xl font-bold text-foreground mb-3">
                {headline}
              </h3>
              <p className="text-muted-foreground mb-6 max-w-2xl">
                {description}
              </p>

              {/* Benefits */}
              <ul className="flex flex-wrap justify-center lg:justify-start gap-x-6 gap-y-2 mb-6">
                {benefits.map((benefit, index) => (
                  <motion.li
                    key={benefit}
                    initial={{ opacity: 0, x: -10 }}
                    whileInView={{ opacity: 1, x: 0 }}
                    viewport={{ once: true }}
                    transition={{ duration: 0.4, delay: 0.3 + index * 0.1 }}
                    className="flex items-center gap-2 text-sm text-muted-foreground"
                  >
                    <span className="w-1.5 h-1.5 rounded-full bg-primary" />
                    {benefit}
                  </motion.li>
                ))}
              </ul>
            </div>

            {/* CTA */}
            <motion.div
              initial={{ opacity: 0, x: 20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: 0.4 }}
              className="flex-shrink-0"
            >
              <Link
                to={ctaHref}
                className="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-primary text-primary-foreground font-medium hover:bg-primary/90 transition-all hover:gap-3 group"
              >
                {ctaText}
                <ArrowRight className="w-4 h-4 transition-transform group-hover:translate-x-1" />
              </Link>
            </motion.div>
          </div>
        </motion.div>
      </div>
    </section>
  );
});

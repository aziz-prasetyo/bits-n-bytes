import "@/styles/globals.css";
import type { Metadata, Viewport } from "next";
import { siteConfig } from "@/config/site";
import { cn } from "@/lib/utils";
import { fontMono, fontSans } from "@/config/fonts";
import Providers from "@/providers";
import { Toaster } from "@/components/ui/toaster";

export const metadata: Metadata = {
  title: {
    default: siteConfig.name,
    template: `%s | ${siteConfig.name}`,
  },
  description: siteConfig.description,
  icons: {
    icon: "/favicon.ico",
  },
};

export const viewport: Viewport = {
  colorScheme: "dark light",
  themeColor: [
    { media: "(prefers-color-scheme: light)", color: "white" },
    { media: "(prefers-color-scheme: dark)", color: "black" },
  ],
};

interface RootLayoutProps {
  children: React.ReactNode;
}

export default function RootLayout({ children }: Readonly<RootLayoutProps>) {
  return (
    <html lang="en" suppressHydrationWarning>
      <body
        className={cn(
          "grid min-h-dvh place-items-center bg-background font-sans antialiased",
          fontSans.variable,
          fontMono.variable,
        )}
      >
        <Providers>{children}</Providers>
        <Toaster />
      </body>
    </html>
  );
}

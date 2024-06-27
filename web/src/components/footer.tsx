import { siteConfig } from "@/config/site";
import { cn } from "@/lib/utils";
import Link from "next/link";

interface FooterProps extends React.HTMLAttributes<HTMLElement> {}

export default function Footer({ className, ...props }: FooterProps) {
  return (
    <footer
      className={cn(
        "z-10 flex h-14 items-center justify-center border-t bg-muted/60 px-4 backdrop-blur-xl md:absolute md:bottom-0 md:left-[220px] md:w-[calc(100%-220px)] lg:left-[280px] lg:h-[60px] lg:w-[calc(100%-280px)] lg:px-6",
        className,
      )}
      {...props}
    >
      <Link
        className="flex items-center gap-1 text-current"
        href={siteConfig.socialLinks.github}
        title={`${siteConfig.name} Repository`}
        target="_blank"
      >
        <span className="text-default-600">&copy; 2024</span>{" "}
        <p className="text-primary">Bits&apos;n&apos;Bytes</p>
      </Link>
    </footer>
  );
}

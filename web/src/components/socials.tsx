import Link from "next/link";
import { Button } from "./ui/button";
import { GithubIcon } from "./icons";
import { siteConfig } from "@/config/site";

export default function Socials() {
  return (
    <Button variant="outline" size="icon" asChild>
      <Link
        aria-label="GitHub"
        href={siteConfig.socialLinks.github}
        target="_blank"
      >
        <GithubIcon className="text-muted-foreground" />
      </Link>
    </Button>
  );
}

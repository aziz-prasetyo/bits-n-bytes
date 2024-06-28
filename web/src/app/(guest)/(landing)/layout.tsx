import Footer from "@/components/footer";
import { AppLogo } from "@/components/icons";
import { ModeToggle } from "@/components/mode-toggle";
import Socials from "@/components/socials";
import Link from "next/link";

interface GuestLayoutProps {
  children: React.ReactNode;
}

export default function GuestLayout({ children }: Readonly<GuestLayoutProps>) {
  return (
    <>
      <header className="container absolute top-0 z-50 mt-8 flex items-center justify-between">
        <Link href="/" className="flex items-center gap-2 font-semibold">
          <AppLogo />
          <span className="hidden sm:block">Bits&apos;n&apos;Bytes</span>
        </Link>
        <div className="flex gap-2">
          <Socials />
          <ModeToggle />
        </div>
      </header>
      <main className="w-full">{children}</main>
      <Footer className="w-full md:relative md:left-0 md:w-full lg:left-0 lg:w-full" />
    </>
  );
}

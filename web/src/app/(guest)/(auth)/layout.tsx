import Footer from "@/components/footer";
import { AppLogo } from "@/components/icons";
import Image from "next/image";
import Link from "next/link";

interface AuthLayoutProps {
  children: React.ReactNode;
}

export default function AuthLayout({ children }: Readonly<AuthLayoutProps>) {
  return (
    <>
      <main className="grid min-h-svh w-full place-items-center lg:grid-cols-2">
        <div className="relative h-full w-full">
          <section className="flex h-full flex-col items-center justify-center px-4 py-12">
            <Link href="/">
              <AppLogo width={120} height={120} />
            </Link>
            {children}
          </section>
          <Footer className="w-full md:left-0 md:w-full lg:left-0 lg:w-full" />
        </div>
        <section className="hidden bg-muted lg:block">
          <Image
            src="/auth-placeholder-banner.svg"
            alt="Image"
            width="1920"
            height="1080"
            className="min-h-svh object-cover dark:brightness-[0.2] dark:grayscale"
          />
        </section>
      </main>
    </>
  );
}

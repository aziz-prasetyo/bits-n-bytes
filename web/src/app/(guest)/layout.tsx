import { Button } from "@/components/ui/button";
import Link from "next/link";

export default function GuestLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <>
      <nav className="container sticky top-8 flex h-16 max-w-3xl place-items-center rounded-2xl bg-white/60 backdrop-blur-lg">
        <ul className="flex w-full items-center justify-between">
          <li>
            <Link href="#hero">Home</Link>
          </li>
          <li>
            <Link href="#about">About Us</Link>
          </li>
          <li>
            <Link href="#features">Features</Link>
          </li>
          <li>
            <Link href="#testimoni">Testimoni</Link>
          </li>
          <li>
            <Link href="#faq">FAQ</Link>
          </li>
        </ul>
        <div className="ml-10 flex-none space-x-2">
          <Button variant="secondary" asChild>
            <Link href="/register">Register</Link>
          </Button>
          <Button asChild>
            <Link href="/login">Login</Link>
          </Button>
        </div>
      </nav>
      {children}
    </>
  );
}

import { Button } from "@/components/ui/button";
import { Home } from "lucide-react";
import Link from "next/link";

export default function NotFound() {
  return (
    <main className="grid min-h-dvh place-items-center">
      <section>
        <div className="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
          <div className="mx-auto max-w-screen-sm text-center">
            <h1 className="text-primary mb-4 text-7xl font-extrabold tracking-tight lg:text-9xl">
              404
            </h1>
            <p className="mb-4 text-3xl font-bold tracking-tight">
              Page Not Found
            </p>
            <p className="text-muted-foreground mb-4 text-lg font-light">
              Sorry, we couldn&apos;t find the page you&apos;re looking for.
            </p>
            <div className="mt-10 flex items-center justify-center gap-x-6">
              <Button asChild>
                <Link href="/">
                  Back to Home <Home className="ml-2 h-4 w-4" />
                </Link>
              </Button>
            </div>
          </div>
        </div>
      </section>
    </main>
  );
}

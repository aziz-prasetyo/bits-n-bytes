import { Button } from "@/components/ui/button";
import Link from "next/link";

export default function Home() {
  return (
    <section
      id="home"
      className="relative grid min-h-[calc(100svh-56px)] place-items-center overflow-hidden py-24 lg:min-h-[calc(100svh-60px)] lg:py-32"
    >
      <div
        aria-hidden="true"
        className="absolute -top-96 start-1/2 flex -translate-x-1/2 transform"
      >
        <div className="h-[44rem] w-[25rem] -translate-y-[5rem] translate-x-[20rem] rotate-[-60deg] transform bg-gradient-to-r from-primary/50 via-primary/5 to-background blur-3xl md:translate-x-[10rem] lg:-translate-x-[5rem]" />
        <div className="h-[50rem] w-[90rem] origin-top-right -translate-x-[10rem] translate-y-[40rem] -rotate-[30deg] transform rounded-full bg-gradient-to-tl from-primary/50 via-primary/5 to-background blur-3xl sm:-translate-x-[22rem] md:-translate-x-[20rem] lg:-translate-x-[5rem]" />
      </div>
      <div className="relative z-10">
        <div className="container py-10 lg:py-16">
          <div className="mx-auto max-w-2xl text-center">
            <p className="text-balance">
              Transforming Futures Through Technology
            </p>
            <div className="mt-5 max-w-2xl">
              <h1 className="scroll-m-20 text-balance text-4xl font-extrabold tracking-tight lg:text-5xl">
                Bits&apos;n&apos;Bytes
              </h1>
            </div>
            <div className="mt-5 max-w-3xl">
              <p className="text-balance text-xl text-muted-foreground">
                Platform inovatif yang dirancang untuk membantu Anda menguasai
                keterampilan teknologi terbaru dan membuka peluang karir yang
                menjanjikan di dunia digital.
              </p>
            </div>
            <Button size={"lg"} className="mt-8" asChild>
              <Link href="/dashboard">Get Started</Link>
            </Button>
          </div>
        </div>
        <div className="absolute -start-20 bottom-12 -z-[1] h-56 w-56 rounded-lg bg-gradient-to-b from-primary/30 via-primary/5 to-background p-px">
          <div className="h-56 w-56 rounded-lg bg-background/5" />
        </div>
        <div className="absolute -end-20 -top-12 -z-[1] h-56 w-56 rounded-full bg-gradient-to-t from-primary/30 via-primary/5 to-background p-px">
          <div className="h-56 w-56 rounded-full bg-background/5" />
        </div>
      </div>
    </section>
  );
}

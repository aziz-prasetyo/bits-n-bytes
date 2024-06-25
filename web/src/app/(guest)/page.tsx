export default function Home() {
  return (
    <main className="-mt-16 flex min-h-screen flex-col items-center justify-between">
      <section
        id="hero"
        className="grid min-h-dvh w-full place-items-center bg-yellow-100"
      >
        <h2 className="scroll-m-20 border-b-4 border-white pb-2 text-3xl font-semibold tracking-tight first:mt-0">
          Hero
        </h2>
      </section>
      <section
        id="about"
        className="grid min-h-dvh w-full place-items-center bg-violet-100"
      >
        <h2 className="scroll-m-20 border-b-4 border-white pb-2 text-3xl font-semibold tracking-tight first:mt-0">
          About Us
        </h2>
      </section>
      <section
        id="features"
        className="grid min-h-dvh w-full place-items-center bg-green-100"
      >
        <h2 className="scroll-m-20 border-b-4 border-white pb-2 text-3xl font-semibold tracking-tight first:mt-0">
          Features
        </h2>
      </section>
      <section
        id="testimoni"
        className="grid min-h-dvh w-full place-items-center bg-blue-100"
      >
        <h2 className="scroll-m-20 border-b-4 border-white pb-2 text-3xl font-semibold tracking-tight first:mt-0">
          Testimoni
        </h2>
      </section>
      <section
        id="faq"
        className="grid min-h-dvh w-full place-items-center bg-red-100"
      >
        <h2 className="scroll-m-20 border-b-4 border-white pb-2 text-3xl font-semibold tracking-tight first:mt-0">
          FAQ
        </h2>
      </section>
    </main>
  );
}

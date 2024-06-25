import SpinnerLoading from "@/components/loading/spinner-loading";

export default function Loading() {
  return (
    <main className="grid min-h-dvh place-items-center">
      <SpinnerLoading size={40} className="text-primary" />
    </main>
  );
}

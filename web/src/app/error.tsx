'use client';

import { Button } from '@/components/ui/button';
import { useEffect } from 'react';

export default function Error({
  error,
  reset,
}: {
  error: Error;
  reset: () => void;
}) {
  useEffect(() => {
    // Log the error to an error reporting service
    /* eslint-disable no-console */
    console.error(error);
  }, [error]);

  return (
    <main className="grid min-h-dvh place-items-center">
      <section>
        <div className="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
          <div className="mx-auto max-w-screen-sm text-center">
            <h1 className="mb-4 text-7xl font-extrabold tracking-tight text-primary lg:text-9xl">
              500
            </h1>
            <p className="mb-4 text-3xl font-bold tracking-tight">
              Internal Server Error
            </p>
            <p className="mb-4 text-lg font-light text-muted-foreground">
              We are already working to solve the problem.
            </p>
            <Button
              onClick={
                // Attempt to recover by trying to re-render the segment
                () => reset()
              }
            >
              Try Again
            </Button>
          </div>
        </div>
      </section>
    </main>
  );
}

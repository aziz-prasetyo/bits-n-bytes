interface MainLayoutProps {
  children: React.ReactNode;
}

export default function MainLayout({ children }: Readonly<MainLayoutProps>) {
  return (
    <div>
      <h1>MainLayout</h1>
      {children}
    </div>
  );
}

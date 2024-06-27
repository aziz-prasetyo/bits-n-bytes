import { SVGProps } from "react";

export type TIconSvgProps = SVGProps<SVGSVGElement> & {
  size?: number;
};

export type TSidebarMenuItem = {
  label: string;
  href: string;
  icon: JSX.Element;
};

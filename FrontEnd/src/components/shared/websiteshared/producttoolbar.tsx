"use client";

import { Grid2X2, List, SlidersHorizontal } from "lucide-react";
import useProductToolBar from "@/hooks/useProductToolBar";

const SORT_OPTIONS = [
  { label: "Relevance (default)", value: "relevance" },
  { label: "Price low to high", value: "price-low" },
  { label: "Price high to low", value: "price-high" },
  { label: "Most popular", value: "popular" },
  { label: "Highest rated", value: "rating" },
  { label: "Newest arrivals", value: "newest" },
];

type ProducttoolbarProps = {
  sort?: ReturnType<typeof useProductToolBar>["sort"];
  setSort?: ReturnType<typeof useProductToolBar>["setSort"];
  view?: ReturnType<typeof useProductToolBar>["view"];
  setView?: ReturnType<typeof useProductToolBar>["setView"];
  onFilterClick?: () => void;
};

const Producttoolbar = ({
  sort: propSort,
  setSort: propSetSort,
  view: propView,
  setView: propSetView,
  onFilterClick,
}: ProducttoolbarProps) => {
  const {
    sort: hookSort,
    setSort: hookSetSort,
    view: hookView,
    setView: hookSetView,
  } = useProductToolBar();

  const sort = propSort ?? hookSort;
  const setSort = propSetSort ?? hookSetSort;
  const view = propView ?? hookView;
  const setView = propSetView ?? hookSetView;

  return (
    <div className="flex items-center gap-3">
      <button
        onClick={onFilterClick}
        className="flex items-center gap-2 rounded-md border px-3 py-2 text-sm"
      >
        <SlidersHorizontal className="h-4 w-4" />
        Filter
      </button>

      <select
        value={sort}
        onChange={(e) => setSort(e.target.value)}
        className="rounded-md border px-3 py-2 text-sm text-muted-foreground"
      >
        {SORT_OPTIONS.map((opt) => (
          <option key={opt.value} value={opt.value}>
            {opt.label}
          </option>
        ))}
      </select>

      <button
        onClick={() => setView("grid")}
        className={`p-1.5 ${view === "grid" ? "bg-gray-100" : ""}`}
        aria-label="Grid view"
      >
        <Grid2X2 className="h-5 w-5" />
      </button>

      <button
        onClick={() => setView("list")}
        className={`p-1.5 ${view === "list" ? "bg-gray-100" : ""}`}
        aria-label="List view"
      >
        <List className="h-5 w-5" />
      </button>
    </div>
  );
};

export default Producttoolbar;
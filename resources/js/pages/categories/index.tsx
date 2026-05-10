import { Head, Link, router } from '@inertiajs/react';
import { Pencil, Plus, Trash2 } from 'lucide-react';
import Heading from '@/components/heading';
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/app-layout';
import type { BreadcrumbItem } from '@/types';

interface Category {
    id: number;
    nombre: string;
    products_count: number;
    created_at: string;
}

interface PaginatedCategories {
    data: Category[];
    current_page: number;
    last_page: number;
    prev_page_url: string | null;
    next_page_url: string | null;
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Categorías', href: '/categories' },
];

export default function CategoriesIndex({ categories }: { categories: PaginatedCategories }) {
    function handleDelete(id: number, nombre: string) {
        if (confirm(`¿Estás seguro de eliminar la categoría "${nombre}"?`)) {
            router.delete(`/categories/${id}`);
        }
    }

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Categorías" />

            <div className="flex h-full flex-1 flex-col gap-4 p-4">
                <div className="flex items-center justify-between">
                    <Heading
                        title="Categorías"
                        description="Administra las categorías de productos"
                    />
                    <Link href="/categories/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Nueva categoría
                        </Button>
                    </Link>
                </div>

                <div className="overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <table className="w-full text-sm">
                        <thead className="border-b bg-muted/50 text-muted-foreground">
                            <tr>
                                <th className="px-4 py-3 text-left font-medium">#</th>
                                <th className="px-4 py-3 text-left font-medium">Nombre</th>
                                <th className="px-4 py-3 text-left font-medium">Productos</th>
                                <th className="px-4 py-3 text-left font-medium">Creada</th>
                                <th className="px-4 py-3 text-right font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {categories.data.length === 0 ? (
                                <tr>
                                    <td colSpan={5} className="px-4 py-8 text-center text-muted-foreground">
                                        No hay categorías registradas.
                                    </td>
                                </tr>
                            ) : (
                                categories.data.map((category) => (
                                    <tr
                                        key={category.id}
                                        className="border-b transition-colors hover:bg-muted/30"
                                    >
                                        <td className="px-4 py-3 text-muted-foreground">{category.id}</td>
                                        <td className="px-4 py-3 font-medium">{category.nombre}</td>
                                        <td className="px-4 py-3">
                                            <span className="rounded-full bg-primary/10 px-2 py-0.5 text-xs font-medium text-primary">
                                                {category.products_count}
                                            </span>
                                        </td>
                                        <td className="px-4 py-3 text-muted-foreground">
                                            {new Date(category.created_at).toLocaleDateString('es-MX')}
                                        </td>
                                        <td className="px-4 py-3">
                                            <div className="flex justify-end gap-2">
                                                <Link href={`/categories/${category.id}/edit`}>
                                                    <Button variant="outline" size="sm">
                                                        <Pencil className="h-3 w-3" />
                                                    </Button>
                                                </Link>
                                                <Button
                                                    variant="destructive"
                                                    size="sm"
                                                    onClick={() => handleDelete(category.id, category.nombre)}
                                                >
                                                    <Trash2 className="h-3 w-3" />
                                                </Button>
                                            </div>
                                        </td>
                                    </tr>
                                ))
                            )}
                        </tbody>
                    </table>

                    {/* Paginación */}
                    {categories.last_page > 1 && (
                        <div className="flex justify-end gap-2 border-t px-4 py-3">
                            {categories.prev_page_url && (
                                <Link href={categories.prev_page_url}>
                                    <Button variant="outline" size="sm">Anterior</Button>
                                </Link>
                            )}
                            <span className="flex items-center text-sm text-muted-foreground">
                                Página {categories.current_page} de {categories.last_page}
                            </span>
                            {categories.next_page_url && (
                                <Link href={categories.next_page_url}>
                                    <Button variant="outline" size="sm">Siguiente</Button>
                                </Link>
                            )}
                        </div>
                    )}
                </div>
            </div>
        </AppLayout>
    );
}

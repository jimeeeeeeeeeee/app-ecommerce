import { Head, useForm } from '@inertiajs/react';
import Heading from '@/components/heading';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import type { BreadcrumbItem } from '@/types';

interface Category {
    id: number;
    nombre: string;
}

export default function CategoriesEdit({ category }: { category: Category }) {
    const breadcrumbs: BreadcrumbItem[] = [
        { title: 'Dashboard', href: '/dashboard' },
        { title: 'Categorías', href: '/categories' },
        { title: `Editar: ${category.nombre}`, href: `/categories/${category.id}/edit` },
    ];

    const { data, setData, put, processing, errors } = useForm({
        nombre: category.nombre,
    });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();
        put(`/categories/${category.id}`);
    }

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`Editar categoría: ${category.nombre}`} />

            <div className="flex h-full flex-1 flex-col gap-4 p-4">
                <Heading
                    title={`Editar: ${category.nombre}`}
                    description="Modifica el nombre de la categoría"
                />

                <div className="max-w-md rounded-xl border border-sidebar-border/70 p-6 dark:border-sidebar-border">
                    <form onSubmit={handleSubmit} className="space-y-6" noValidate>
                        <div className="grid gap-2">
                            <Label htmlFor="nombre">Nombre</Label>
                            <Input
                                id="nombre"
                                type="text"
                                value={data.nombre}
                                onChange={(e) => setData('nombre', e.target.value)}
                                placeholder="Ej. Electrónica"
                                required
                                minLength={2}
                                maxLength={100}
                            />
                            <InputError message={errors.nombre} />
                        </div>

                        <div className="flex gap-3">
                            <Button type="submit" disabled={processing}>
                                {processing ? 'Actualizando...' : 'Actualizar categoría'}
                            </Button>
                            <Button
                                type="button"
                                variant="outline"
                                onClick={() => window.history.back()}
                            >
                                Cancelar
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </AppLayout>
    );
}

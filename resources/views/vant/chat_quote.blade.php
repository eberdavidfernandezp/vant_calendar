<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VANT | VENEZUELA</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Oswald:wght@500;600;700&family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #e5e5e7;
            color: #121214;
            overflow-x: hidden;
        }

        .font-condensed {
            font-family: 'Oswald', sans-serif;
        }

        .bx1 {
            margin-top: 1rem;
        }

        .formChat {
            max-width: 80%;
            justify-self: center;
        }

        /* Regla exclusiva para PC (pantallas mayores a 1024px) */
        @media (min-width: 1024px) {
            .navBar {
                position: fixed;
                margin-top: 2rem;
            }
        }
    </style>
</head>

<body class="min-h-screen relative flex flex-col justify-between selection:bg-black selection:text-white">

    @include('vant.components.navbar')

    <main class="max-w-xl w-full mx-auto my-auto py-8">
        <div class="formChat">
            <div class="mb-6 space-y-4">
                <div class="bg-[#e5e5e7] border border-[#6E6E73]/40 p-6 rounded-lg text-sm bx1">
                    <p class="text-[#5A738E] text-xs font-mono mb-1">// ASISTENTE DE PROYECTOS</p>
                    Bienvenido al canal interactivo. Complete los parámetros para empaquetar su requerimiento y despacharlo por WhatsApp o Gmail.
                </div>
            </div>

            <form id="chatQuoteForm" class="space-y-4 bg-[#2C2C2E]/50 border border-[#6E6E73]/30 p-6 rounded-xl">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-[#BFC0C0] mb-1">1. Nombre / Marca</label>
                    <input type="text" name="client_name" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] text-[#F0F1F2] p-3 rounded text-sm focus:border-[#5A738E] focus:outline-none" placeholder="Tu Nombre o Empresa">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-[#BFC0C0] mb-1">2. Tipo de Proyecto</label>
                    <select name="project_type" class="w-full bg-[#1C1C1E] border border-[#6E6E73] text-[#F0F1F2] p-3 rounded text-sm focus:border-[#5A738E] focus:outline-none">
                        <option value="Desarrollo Web de Alto Rendimiento">Desarrollo Web de Alto Rendimiento</option>
                        <option value="Sistemas Visuales y Branding">Sistemas Visuales y Branding</option>
                        <option value="Auditoría y Estrategia Digital">Auditoría y Estrategia Digital</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-[#BFC0C0] mb-1">3. Rango de Inversión</label>
                    <select name="budget_range" class="w-full bg-[#1C1C1E] border border-[#6E6E73] text-[#F0F1F2] p-3 rounded text-sm focus:border-[#5A738E] focus:outline-none">
                        <option value="$500 - $1,000">$500 - $1,000 USD</option>
                        <option value="$1,000 - $3,000">$1,000 - $3,000 USD</option>
                        <option value="$3,000+">$3,000+ USD (Enterprise)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-[#BFC0C0] mb-1">4. Descripción del Requerimiento</label>
                    <textarea name="message" rows="3" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] text-[#F0F1F2] p-3 rounded text-sm focus:border-[#5A738E] focus:outline-none" placeholder="¿Qué problema resolveremos?"></textarea>
                </div>

                <div class="pt-2">
                    <!-- EN ESCRITORIO (md: en adelante): Solo muestra Gmail en ancho completo. EN MÓVIL: Muestra ambos (WhatsApp y Gmail). -->
                    <div class="hidden md:block">
                        <button type="button" onclick="submitLead('gmail')" class="w-full bg-[#5A738E]/20 border border-[#5A738E] text-[#F0F1F2] hover:bg-[#5A738E] transition py-3 rounded text-sm font-bold">
                            Enviar a Gmail ✉️
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-4 md:hidden">
                        <button type="button" onclick="submitLead('whatsapp')" class="bg-[#25D366]/20 border border-[#25D366] text-[#25D366] hover:bg-[#25D366] hover:text-black transition py-3 rounded text-sm font-bold">
                            WhatsApp 🟢
                        </button>
                        <button type="button" onclick="submitLead('gmail')" class="bg-[#5A738E]/20 border border-[#5A738E] text-[#F0F1F2] hover:bg-[#5A738E] transition py-3 rounded text-sm font-bold">
                            Gmail ✉️
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <footer class="text-center text-xs text-[#6E6E73] border-t border-[#6E6E73]/30 pt-4">
        <p>&copy; {{ date('Y') }} VANT | VENEZUELA.</p>
    </footer>

    <script>
        function submitLead(channel) {
            const form = document.getElementById('chatQuoteForm');

            // Validar que los campos requeridos estén llenos
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const clientName = form.querySelector('[name="client_name"]').value;
            const projectType = form.querySelector('[name="project_type"]').value;
            const budgetRange = form.querySelector('[name="budget_range"]').value;
            const message = form.querySelector('[name="message"]').value;

            if (channel === 'whatsapp') {
                // Número de WhatsApp de VANT (formato internacional sin el símbolo +)
                const phone = "584120770039";

                // Estructurar el mensaje formal con formato corporativo
                const text = `*¡NUEVO REQUERIMIENTO VANT!*%0A%0A` +
                    `👤 *Cliente / Marca:* ${encodeURIComponent(clientName)}%0A` +
                    `📁 *Tipo de Proyecto:* ${encodeURIComponent(projectType)}%0A` +
                    `💰 *Inversión Estimada:* ${encodeURIComponent(budgetRange)}%0A` +
                    `📝 *Requerimiento:* ${encodeURIComponent(message)}`;

                // Abrir la API de WhatsApp en una nueva pestaña
                const whatsappURL = `https://api.whatsapp.com/send?phone=${phone}&text=${text}`;
                window.open(whatsappURL, '_blank');

            } else if (channel === 'gmail') {
                // Envío por correo electrónico (mailto) o mantener tu lógica de AJAX
                const emailSubject = encodeURIComponent(`Nuevo Requerimiento de Proyecto: ${clientName}`);
                const emailBody = encodeURIComponent(`Cliente: ${clientName}\nTipo de Proyecto: ${projectType}\nInversión: ${budgetRange}\n\nMensaje:\n${message}`);
                window.location.href = `mailto:contacto@vant.com?subject=${emailSubject}&body=${emailBody}`;
            }
        }
    </script>
</body>

</html>
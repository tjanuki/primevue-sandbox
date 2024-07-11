import { useToast } from 'primevue/usetoast';

export const useToastService = () => {
    const toast = useToast();

    const showToast = (severity, summary, detail, life = 3000) => {
        toast.add({ severity, summary, detail, life });
    };

    return {
        showSuccess: (summary, detail) => showToast('success', summary, detail),
        showInfo: (summary, detail) => showToast('info', summary, detail),
        showWarn: (summary, detail) => showToast('warn', summary, detail),
        showError: (summary, detail) => showToast('error', summary, detail),
    };
};

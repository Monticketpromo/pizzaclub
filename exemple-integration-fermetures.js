/**
 * EXEMPLE D'INTÉGRATION - Vérification des fermetures
 * À ajouter dans votre fichier script.js ou au début du processus de commande
 */

// Fonction pour vérifier si le restaurant est fermé
async function checkRestaurantStatus() {
    try {
        const response = await fetch('check-closure.php');
        const data = await response.json();
        
        if (data.isClosed) {
            return {
                isOpen: false,
                message: data.message,
                type: data.type,
                reason: data.reason
            };
        }
        
        return {
            isOpen: true,
            message: null
        };
    } catch (error) {
        console.error('Erreur lors de la vérification du statut:', error);
        // En cas d'erreur, on laisse passer pour ne pas bloquer les commandes
        return {
            isOpen: true,
            message: null
        };
    }
}

// Vérifier au chargement de la page
document.addEventListener('DOMContentLoaded', async function() {
    const status = await checkRestaurantStatus();
    
    if (!status.isOpen) {
        displayClosureMessage(status);
        disableOrderForm();
    }
});

// Afficher un message de fermeture
function displayClosureMessage(status) {
    // Créer un bandeau d'information
    const banner = document.createElement('div');
    banner.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        z-index: 9999;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    `;
    banner.innerHTML = status.message;
    document.body.prepend(banner);
    
    // Ajouter un espacement en haut de la page
    document.body.style.paddingTop = '70px';
}

// Désactiver le formulaire de commande
function disableOrderForm() {
    // Désactiver tous les boutons d'ajout au panier
    const addButtons = document.querySelectorAll('.add-to-cart, .btn-commander, .order-button');
    addButtons.forEach(button => {
        button.disabled = true;
        button.style.opacity = '0.5';
        button.style.cursor = 'not-allowed';
        button.title = 'Restaurant fermé';
    });
    
    // Empêcher la soumission du formulaire
    const forms = document.querySelectorAll('form.order-form, #orderForm');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('⚠️ Le restaurant est actuellement fermé. Merci de réessayer plus tard.');
            return false;
        });
    });
}

// Vérifier périodiquement (toutes les 5 minutes)
// Utile si l'utilisateur reste longtemps sur la page
setInterval(async function() {
    const status = await checkRestaurantStatus();
    
    if (!status.isOpen) {
        // Si le restaurant vient de fermer, recharger la page
        if (document.querySelector('.add-to-cart:not(:disabled)')) {
            location.reload();
        }
    }
}, 5 * 60 * 1000); // 5 minutes

// EXEMPLE D'UTILISATION DANS LE PROCESSUS DE COMMANDE
// À ajouter avant d'envoyer la commande

async function validateAndSubmitOrder(orderData) {
    // Vérifier une dernière fois avant d'envoyer
    const status = await checkRestaurantStatus();
    
    if (!status.isOpen) {
        alert('⚠️ ' + status.message + '\n\nVotre commande ne peut pas être envoyée pour le moment.');
        return false;
    }
    
    // Si le restaurant est ouvert, continuer avec l'envoi
    return submitOrder(orderData);
}

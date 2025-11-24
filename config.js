// ========================================
// CONFIGURATION
// ========================================
const CONFIG = {
    // Email configuration (EmailJS)
    email: {
        serviceId: 'YOUR_EMAILJS_SERVICE_ID', // À remplacer par votre Service ID EmailJS
        templateId: 'YOUR_EMAILJS_TEMPLATE_ID', // À remplacer par votre Template ID
        publicKey: 'YOUR_EMAILJS_PUBLIC_KEY', // À remplacer par votre clé publique
        recipientEmail: 'contact@pizzaclub.fr' // Email où recevoir les commandes
    },
    
    // SMS configuration (Twilio)
    sms: {
        enabled: false, // Mettre à true pour activer
        accountSid: 'YOUR_TWILIO_ACCOUNT_SID',
        authToken: 'YOUR_TWILIO_AUTH_TOKEN',
        fromNumber: '+33123456789',
        toNumber: '+33123456789' // Numéro du pizzeria
    },
    
    // Delivery settings
    delivery: {
        fee: 0, // Livraison GRATUITE à La Réunion
        freeDeliveryThreshold: 0, // Toujours gratuit
        estimatedTime: {
            livraison: '45-60 min',
            emporter: '15-20 min'
        }
    },
    
    // Restaurant info
    restaurant: {
        name: 'Pizza Club',
        address: '43 Rue Four à Chaux, 97410 Saint-Pierre, La Réunion',
        phone: '0262 66 82 30',
        email: 'contact@pizzaclub.fr'
    },
    
    // Heures d'ouverture
    openingHours: {
        closedDays: [1], // Jours fermés (0=dimanche, 1=lundi, 2=mardi, etc.)
        midi: {
            start: 11,  // 11h
            end: 14     // 14h (fermeture cuisine)
        },
        soir: {
            start: 18,  // 18h
            end: 21     // 21h (fermeture cuisine - 20h15/21h15 selon le jour)
        },
        preorderBuffer: 1  // 1 heure de battement pour précommander (depuis 10h pour midi, depuis 17h pour soir)
    }
};

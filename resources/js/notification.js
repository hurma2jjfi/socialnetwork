class Notification {
    playNotificationSound() {
        const audio = new Audio('/sounds/NotificationMessage.mp3');
        audio.play();
    }
    
    checkForNewMessages() {
        const newMessageReceived = true; 

        if (newMessageReceived) {
            this.playNotificationSound();
        }
    }
    
    constructor() {
        setInterval(() => this.checkForNewMessages(), 5000);
    }
}

const notification = new Notification();

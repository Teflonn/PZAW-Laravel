<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Publication;

class PublicationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
     
    }
    public function update(?User $user, Publication $publication): bool
{
    if ($user && $user->id === $publication->author_id) {
        // TODO: Umieść tutaj kod dla przypadku, gdy użytkownik jest właścicielem publikacji
        // Na przykład, możesz zezwolić na aktualizację publikacji
        return true;
    } else {
        // TODO: Umieść tutaj kod dla przypadku, gdy użytkownik nie jest właścicielem publikacji
        // Na przykład, możesz zwrócić błąd lub po prostu zablokować aktualizację
        return false;
    }
}
}

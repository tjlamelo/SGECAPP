<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande d'État Civil - Cameroun</title>
</head>
<body style="color: #1F2937; background-color: #ffffff; padding: 1.5rem; max-width: 64rem; margin: auto; font-family: sans-serif;">

<!-- Entête structuré (gauche / centre / droite bien équilibré) -->
<div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 4px solid #1E3A8A; padding: 20px 0; font-family: sans-serif; text-align: center;">
    
    <!-- Colonne gauche -->
    <div style="flex: 1; text-align: left; padding-right: 10px;">
        <p style="margin: 0; font-size: 13px; font-weight: bold; color: #1E3A8A;">RÉPUBLIQUE DU CAMEROUN</p>
        <p style="margin: 0; font-size: 12px;">Paix - Travail - Patrie</p>
        <div style="border-left: 3px solid #1E3A8A; padding-left: 8px; margin-top: 10px; font-size: 12px;">
            <p style="margin: 2px 0;"><strong>MINISTÈRE DE L'ADMINISTRATION TERRITORIALE</strong></p>
            <p style="margin: 2px 0;">Délégation Régionale du Littoral</p>
            <p style="margin: 2px 0;">Commune de Douala Vème</p>
            <p style="margin: 2px 0;">Arrondissement de Douala</p>
            <p style="margin: 2px 0;">Centre d'État Civil Principal</p>
        </div>
    </div>

    <!-- Colonne centrale -->
    <div style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4f/Coat_of_arms_of_Cameroon.svg" 
             alt="Armoiries du Cameroun"
             style="width: 60px; height: auto; margin-bottom: 6px;">
        <p style="margin: 0; font-size: 11px;"><em>N°: __________________</em></p>
    </div>

    <!-- Colonne droite -->
    <div style="flex: 1; text-align: right; padding-left: 10px;">
        <p style="margin: 0; font-size: 13px; font-weight: bold; color: #1E3A8A;">REPUBLIC OF CAMEROON</p>
        <p style="margin: 0; font-size: 12px;">Peace - Work - Fatherland</p>
        <div style="border-right: 3px solid #1E3A8A; padding-right: 8px; margin-top: 10px; font-size: 12px;">
            <p style="margin: 2px 0;"><strong>MINISTRY OF TERRITORIAL ADMINISTRATION</strong></p>
            <p style="margin: 2px 0;">Littoral Regional Delegation</p>
            <p style="margin: 2px 0;">Douala Vth Council</p>
            <p style="margin: 2px 0;">Douala Subdivision</p>
            <p style="margin: 2px 0;">Main Civil Status Center</p>
        </div>
    </div>

</div>


    <!-- Titre -->
    <div style="text-align: center; margin-bottom: 1.5rem;">
        <p style="font-size: 0.875rem; font-weight: bold; text-transform: uppercase; letter-spacing: 0.05em; margin: 0;">
            Extrait d'acte de {{ ucfirst($demande->acte_type) }}
        </p>
        <p style="font-size: 0.75rem; font-style: italic; margin-top: 0.25rem;">
            (Extract of {{ $demande->acte_type }} record)
        </p>
    </div>

    <!-- Informations personnelles -->
    <div style="margin-bottom: 2.5rem; background-color: #ffffff; border-radius: 0.375rem; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">
        <h2 style="font-size: 1rem; font-weight: 600; color: #1F2937; background-color: #F3F4F6; padding: 0.75rem; border-bottom: 1px solid #D1D5DB; margin: -1.5rem -1.5rem 1.5rem; border-radius: 0.375rem 0.375rem 0 0;">
            Informations Personnelles
        </h2>
        <table style="width: 100%; font-size: 0.875rem;">
            <tbody style="border: 1px solid #D1D5DB;">
            @foreach ($fields as $field)
                <tr style="border-bottom: 1px solid #E5E7EB;">
                    <td style="font-weight: 500; color: #4B5563; background-color: #F9FAFB; padding: 0.5rem 1rem; width: 33.3333%; border-right: 1px solid #E5E7EB; vertical-align: top;">
                        {{ $field['label'] }}
                    </td>
                    <td style="padding: 0.5rem 1rem; color: #1F2937; text-transform: capitalize; word-break: break-word;">
                        @php
                            $fieldName = $field['name'];
                            $value = $userDetails ? ($userDetails->$fieldName ?? '<span style="color: #9CA3AF;">Non renseigné</span>') : '<span style="color: #9CA3AF;">Non renseigné</span>';
                        @endphp
                        {!! $value !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Détails de la demande -->
    <div style="margin-bottom: 2.5rem;">
        <h2 style="font-size: 1rem; font-weight: 600; color: #1F2937; background-color: #F3F4F6; padding: 0.75rem; border-bottom: 1px solid #D1D5DB; border-radius: 0.375rem 0.375rem 0 0;">
            Détails de la Demande
        </h2>
        <table style="width: 100%; font-size: 0.875rem; border: 1px solid #D1D5DB;">
            <tbody>
                <tr style="border-bottom: 1px solid #E5E7EB;">
                    <td style="background-color: #F9FAFB; font-weight: 500; padding: 0.5rem 1rem; width: 33.3333%; border-right: 1px solid #E5E7EB;">Type d'acte</td>
                    <td style="padding: 0.5rem 1rem; text-transform: capitalize;">{{ $demande->acte_type }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #E5E7EB;">
                    <td style="background-color: #F9FAFB; font-weight: 500; padding: 0.5rem 1rem; border-right: 1px solid #E5E7EB;">Date de la demande</td>
                    <td style="padding: 0.5rem 1rem;">{{ $demande->created_at->format('d/m/Y à H:i') }}</td>
                </tr>
                <tr>
                    <td style="background-color: #F9FAFB; font-weight: 500; padding: 0.5rem 1rem; border-right: 1px solid #E5E7EB;">Statut</td>
                    <td style="padding: 0.5rem 1rem;">
                        @php
                            $status = ucfirst($demande->status);
                            $styles = $demande->status === 'en attente' ? 'background-color: #FEF3C7; color: #92400E;' :
                                      ($demande->status === 'validé' ? 'background-color: #D1FAE5; color: #065F46;' :
                                      'background-color: #FECACA; color: #991B1B;');
                        @endphp
                        <span style="display: inline-block; padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; {{ $styles }}">
                            {{ $status }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>

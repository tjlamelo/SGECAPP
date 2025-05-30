<?php

namespace App\Enum;

enum Role: string
{
    case Admin = 'admin';
    case AgentEtatCivil = 'agent_etat_civil';
    case AgentTribunal = 'agent_tribunal';
    case AgentHopital = 'agent_hopital';
    case AgentMinistere = 'agent_ministere';
    case AgentOrganisme = 'agent_organisme';
    case Default = 'default';









}

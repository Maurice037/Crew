<?php


$vehicles = [
    // Luftfahrzeuge Vanilla
        ['C_Heli_Light_01_civil_F','M900'],
        ['B_Heli_Light_01_F','MH-9 Hummingbird'],
        ['B_Heli_Light_01_stripped_F','MH-9 Hummingbird Stripped'],
        ['O_Heli_Light_02_unarmed_F','PO-30 Orca'],
        ['I_Heli_Transport_02_F','CH-49 Mohawk'],
        ['B_Heli_Transport_03_unarmed_F','CH-5 Huron'],
        ['O_Heli_Transport_04_F','Mi-290 Taru'],
        ['I_Heli_light_03_unarmed_F','WY-55 Hellcat'],
        ['B_Heli_Transport_01_F','UH-80 Ghost Hawk'],
        ['C_Plane_Civil_01_F','Caesar BTT'],
        ['B_Heli_Light_01_armed_F','AH-9 Pawnee'],
        ['O_T_VTOL_02_infantry_F','Y-32 Xi\'An'],



    // Boote Vanilla
        ['C_Rubberboat','Rettungsboot'],
        ['C_Boat_Civil_01_F','Motorboot'],
        ['C_Boat_Transport_02_F','RHIB'],
        ['C_Scooter_Transport_01_F','Wasserscooter'],
        ['B_Boat_Transport_01_F','Kampfboot'],
        ['C_Boat_Civil_01_police_F','Motorboot (Polizei)'],
        ['B_SDV_01_F','SDV'],

    
    // Landfahrzeuge Vanilla
        ['B_Quadbike_01_F','Quadbike'],
        ['C_Hatchback_01_F','Hatchback'],
        ['C_Hatchback_01_sport_F','Hatchback Sport'],
        ['C_Offroad_01_F','Offroader'],
        ['B_G_Offroad_01_F','Offroader'],
        ['C_Offroad_02_unarmed_F','MB 4 WD'],
        ['C_SUV_01_F','SUV'],
        ['O_T_LSV_02_unarmed_F','Quilin (Unbewaffnet)'],
        ['B_MRAP_01_F','Hunter'],
        ['B_MRAP_01_hmg_F','Hunter HMG'],
        ['O_MRAP_02_F','Ifrit'],
        ['O_MRAP_02_hmg_F','Ifrit (HMG)'],
        ['I_MRAP_03_F','Strider'],
        ['I_MRAP_03_hmg_F','Strider HMG'],
        ['C_Van_02_medevac_F','Transporter (Ambulanz)'],
        ['I_Truck_02_medical_F','Zamak (Sanitätsfahrzeug)'],
        ['O_Truck_03_medical_F','Tempest (Sanitätsfahrzeug)'],
        ['B_Truck_01_medical_F','HEMTT (Sanitätsfarzeug)'],
        ['C_Van_01_transport_F','Truck'],
        ['C_Van_01_box_F','Truck Box'],
        ['C_Van_01_fuel_F','Truck Fuel'],
        ['I_Truck_02_transport_F','Zamak'],
        ['I_Truck_02_covered_F','Zamak Abgedeckt'],
        ['I_Truck_02_fuel_F','Zamak Fuel'],
        ['O_Truck_03_transport_F','Tempest'],
        ['O_Truck_03_covered_F','Tempest Abgedeckt'],
        ['O_Truck_03_device_F','Tempest Gerät'],
        ['B_Truck_01_box_F','HEMTT Box'],
        ['B_Truck_01_fuel_F','HEMTT Tanken'],
        ['B_Truck_01_transport_F','HEMTT Transport'],
        ['B_T_LSV_01_unarmed_F','Prowler (Unbewaffnet)'],
        ['C_Van_02_transport_F','Van Transport'],
        ['C_Van_02_vehicle_F','Van Fahrzeug'],

        ['C_Kart_01_Vrana_F','Kart Vrana'],
        ['C_Kart_01_Blu_F','Kart Blu'],
        ['C_Kart_01_Red_F','Kart Rot'],



];

function class_to_vehname ($classname) {
    global $vehicles;
    foreach ($vehicles as $v) {
        if ($v[0] == $classname) {
            return $v[1];
        }
    }
    return "CLASS: ".$classname;
}


?>
